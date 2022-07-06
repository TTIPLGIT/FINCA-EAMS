<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Electronics;
use App\Models\Company;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Config;
use DB;
use Gate;
use Input;
use Lang;
use Redirect;
use Illuminate\Http\Request;
use Slack;
use Str;
use View;
use Image;
use App\Http\Requests\ImageUploadRequest;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ElectronicsController extends Controller
{

    /**
    * Returns a view that invokes the ajax tables which actually contains
    * the content for the accessories listing, which is generated in getDatatable.
    *
    * @author [A. Gianotto] [<snipe@snipe.net>]
    * @see AccessoriesController::getDatatable() method that generates the JSON response
    * @since [v1.0]
    * @return View
    */
    public function index(Request $request)
    {
        $this->authorize('index', Electronics::class);
        return view('electronics/index');
    }


  /**
   * Returns a view with a form to create a new Accessory.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @return View
   */
    public function create(Request $request)
    {
        $this->authorize('create', Electronics::class);
        $category_type = 'electronics';
        return view('electronics/edit')->with('category_type', $category_type)
          ->with('item', new Electronics);
    }


  /**
   * Validate and save new Accessory from form post
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @return Redirect
   */
    public function store(ImageUploadRequest $request)
    {
        $this->authorize(Electronics::class);
        // create a new model instance
        $electronics = new Electronics();

        // Update the accessory data
        $electronics->name                    = request('name');
        $electronics->category_id             = request('category_id');
        $electronics->location_id             = request('location_id');
        $electronics->min_amt                 = request('min_amt');
        $electronics->company_id              = Company::getIdForCurrentUser(request('company_id'));
        $electronics->order_number            = request('order_number');
        $electronics->manufacturer_id         = request('manufacturer_id');
        $electronics->model_number            = request('model_number');
        $electronics->purchase_date           = request('purchase_date');
        $electronics->purchase_cost           = Helper::ParseFloat(request('purchase_cost'));
        $electronics->qty                     = request('qty');
        $electronics->user_id                 = Auth::user()->id;
        $electronics->supplier_id             = request('supplier_id');

        if ($request->hasFile('image')) {

            if (!config('app.lock_passwords')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $file_name = "electronics-".str_random(18).'.'.$ext;
                $path = public_path('/uploads/electronics');
                if ($image->getClientOriginalExtension()!='svg') {
                    Image::make($image->getRealPath())->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path.'/'.$file_name);
                } else {
                    $image->move($path, $file_name);
                }
                $electronics->image = $file_name;
            }
        }



        // Was the accessory created?
        if ($electronics->save()) {
            // Redirect to the new accessory  page
            return redirect()->route('electronics.index')->with('success', trans('admin/electronics/message.create.success'));
        }
        return redirect()->back()->withInput()->withErrors($electronics->getErrors());
    }

  /**
   * Return view for the Accessory update form, prepopulated with existing data
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $electronicsId
   * @return View
   */
    public function edit(Request $request, $electronicsId = null)
    {

        if ($item = Electronics::find($electronicsId)) {
            $this->authorize($item);
            $category_type = 'electronics';
            return view('electronics/edit', compact('item'))->with('category_type', $category_type);
        }

        return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.does_not_exist'));

    }


  /**
   * Save edited Accessory from form post
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $electronicsId
   * @return Redirect
   */
    public function update(ImageUploadRequest $request, $electronicsId = null)
    {
        if (is_null($electronics = Electronics::find($electronicsId))) {
            return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.does_not_exist'));
        }

        $this->authorize($electronics);

        // Update the accessory data
        $electronics->name                    = request('name');
        $electronics->location_id             = request('location_id');
        $electronics->min_amt                 = request('min_amt');
        $electronics->category_id             = request('category_id');
        $electronics->company_id              = Company::getIdForCurrentUser(request('company_id'));
        $electronics->manufacturer_id         = request('manufacturer_id');
        $electronics->order_number            = request('order_number');
        $electronics->model_number            = request('model_number');
        $electronics->purchase_date           = request('purchase_date');
        $electronics->purchase_cost           = request('purchase_cost');
        $electronics->qty                     = request('qty');
        $electronics->supplier_id             = request('supplier_id');

        if ($request->hasFile('image')) {

            if (!config('app.lock_passwords')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $file_name = "electronics-".str_random(18).'.'.$ext;
                $path = public_path('/uploads/electronics');
                if ($image->getClientOriginalExtension()!='svg') {
                    Image::make($image->getRealPath())->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path.'/'.$file_name);
                } else {
                    $image->move($path, $file_name);
                }
                if (($electronics->image) && (file_exists($path.'/'.$electronics->image))) {
                    unlink($path.'/'.$electronics->image);
                }

                $electronics->image = $file_name;
            }
        }


        // Was the accessory updated?
        if ($electronics->save()) {
            return redirect()->route('electronics.index')->with('success', trans('admin/electronics/message.update.success'));
        }
        return redirect()->back()->withInput()->withErrors($electronics->getErrors());
    }

  /**
   * Delete the given accessory.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $electronicsId
   * @return Redirect
   */
    public function destroy(Request $request, $electronicsId)
    {
        if (is_null($electronics = Electronics::find($electronicsId))) {
            return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.not_found'));
        }

        $this->authorize($electronics);


        if ($electronics->hasUsers() > 0) {
             return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.assoc_users', array('count'=> $electronics->hasUsers())));
        }
        $electronics->delete();
        return redirect()->route('electronics.index')->with('success', trans('admin/electronics/message.delete.success'));
    }



  /**
  * Returns a view that invokes the ajax table which  contains
  * the content for the accessory detail view, which is generated in getDataView.
  *
  * @author [A. Gianotto] [<snipe@snipe.net>]
  * @param  int  $electronicsId
  * @see ElectronicsController::getDataView() method that generates the JSON response
  * @since [v1.0]
  * @return View
  */
    public function show(Request $request, $electronicsId = null)
    {
        $electronics = Electronics::find($electronicsId);
        $this->authorize('view', $electronics);
        if (isset($electronics->id)) {
            return view('electronics/view', compact('electronics'));
        }
        return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.does_not_exist', compact('id')));
    }

  /**
   * Return the form to checkout an Accessory to a user.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $electronicsId
   * @return View
   */
    public function getCheckout(Request $request, $electronicsId)
    {
        // Check if the accessory exists
        if (is_null($electronics = Electronics::find($electronicsId))) {
            // Redirect to the accessory management page with error
            return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.not_found'));
        }

        if ($electronics->category) {

            $this->authorize('checkout', $electronics);

            // Get the dropdown of users and then pass it to the checkout view
            return view('electronics/checkout', compact('electronics'));
        }

        return redirect()->back()->with('error', 'The category type for this accessory is not valid. Edit the accessory and select a valid accessory category.');



    }

  /**
   * Save the Accessory checkout information.
   *
   * If Slack is enabled and/or asset acceptance is enabled, it will also
   * trigger a Slack message and send an email.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $electronicsId
   * @return Redirect
   */
    public function postCheckout(Request $request, $electronicsId)
    {
      // Check if the accessory exists
        if (is_null($electronics = Electronics::find($electronicsId))) {
            // Redirect to the accessory management page with error
            return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.user_not_found'));
        }

        $this->authorize('checkout', $electronics);

        if (!$user = User::find(Input::get('assigned_to'))) {
            return redirect()->route('checkout/electronics', $electronics->id)->with('error', trans('admin/electronics/message.checkout.user_does_not_exist'));
        }

      // Update the accessory data
        $electronics->assigned_to = e(Input::get('assigned_to'));

        $electronics->users()->attach($electronics->id, [
            'electronics_id' => $electronics->id,
            'created_at' => Carbon::now(),
            'user_id' => Auth::id(),
            'assigned_to' => $request->get('assigned_to')
        ]);

        $logaction = $electronics->logCheckout(e(Input::get('note')), $user);

        DB::table('electronics_users')->where('assigned_to', '=', $electronics->assigned_to)->where('electronics_id', '=', $electronics->id)->first();

        $data['log_id'] = $logaction->id;
        $data['eula'] = $electronics->getEula();
        $data['first_name'] = $user->first_name;
        $data['item_name'] = $electronics->name;
        $data['checkout_date'] = $logaction->created_at;
        $data['item_tag'] = '';
        $data['expected_checkin'] = '';
        $data['note'] = $logaction->note;
        $data['require_acceptance'] = $electronics->requireAcceptance();

      // Redirect to the new accessory page
        return redirect()->route('electronics.index')->with('success', trans('admin/electronics/message.checkout.success'));
    }


    /**
     * Check the accessory back into inventory
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param Request $request
     * @param integer $electronicsUserId
     * @param string $backto
     * @return View
     * @internal param int $electronicsId
     */
    public function getCheckin(Request $request, $electronicsUserId = null, $backto = null)
    {
        // Check if the accessory exists
        if (is_null($electronics_user = DB::table('electronics_users')->find($electronicsUserId))) {
            // Redirect to the accessory management page with error
            return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.not_found'));
        }

        $electronics = Electronics::find($electronics_user->electronics_id);
        $this->authorize('checkin', $electronics);
        return view('electronics/checkin', compact('electronics'))->with('backto', $backto);
    }


    /**
     * Check in the item so that it can be checked out again to someone else
     *
     * @uses Accessory::checkin_email() to determine if an email can and should be sent
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param Request $request
     * @param integer $electronicsUserId
     * @param string $backto
     * @return Redirect
     * @internal param int $electronicsId
     */
    public function postCheckin(Request $request, $electronicsUserId = null, $backto = null)
    {
      // Check if the accessory exists
        if (is_null($electronics_user = DB::table('electronics_users')->find($electronicsUserId))) {
            // Redirect to the accessory management page with error
            return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.does_not_exist'));
        }

        $electronics = Electronics::find($electronics_user->electronics_id);

        $this->authorize('checkin', $electronics);

        $return_to = e($electronics_user->assigned_to);
        $logaction = $electronics->logCheckin(User::find($return_to), e(Input::get('note')));

        // Was the accessory updated?
        if (DB::table('electronics_users')->where('id', '=', $electronics_user->id)->delete()) {
            if (!is_null($electronics_user->assigned_to)) {
                $user = User::find($electronics_user->assigned_to);
            }

            $data['log_id'] = $logaction->id;
            $data['first_name'] = e($user->first_name);
            $data['last_name'] = e($user->last_name);
            $data['item_name'] = e($electronics->name);
            $data['checkin_date'] = e($logaction->created_at);
            $data['item_tag'] = '';
            $data['note'] = e($logaction->note);

            if ($backto=='user') {
                return redirect()->route("users.show", $return_to)->with('success', trans('admin/electronics/message.checkin.success'));
            }
            return redirect()->route("electronics.show", $electronics->id)->with('success', trans('admin/electronics/message.checkin.success'));
        }
        // Redirect to the accessory management page with error
        return redirect()->route('electronics.index')->with('error', trans('admin/electronics/message.checkin.error'));
    }


}
