<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Furnitures;
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
class FurnituresController extends Controller
{

    /**
    * Returns a view that invokes the ajax tables which actually contains
    * the content for the furnitures listing, which is generated in getDatatable.
    *
    * @author [A. Gianotto] [<snipe@snipe.net>]
    * @see FurnituresController::getDatatable() method that generates the JSON response
    * @since [v1.0]
    * @return View
    */
    public function index(Request $request)
    {
        $this->authorize('index', Furnitures::class);
        return view('furnitures/index');
    }


  /**
   * Returns a view with a form to create a new Accessory.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @return View
   */
    public function create(Request $request)
    {
        $this->authorize('create', Furnitures::class);
        $category_type = 'furnitures';
        return view('furnitures/edit')->with('category_type', $category_type)
          ->with('item', new Furnitures);
    }


  /**
   * Validate and save new Accessory from form post
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @return Redirect
   */
    public function store(ImageUploadRequest $request)
    {
        $this->authorize(Furnitures::class);
        // create a new model instance
        $furnitures = new Furnitures();

        // Update the accessory data
        $furnitures->name                    = request('name');
        $furnitures->category_id             = request('category_id');
        $furnitures->location_id             = request('location_id');
        $furnitures->min_amt                 = request('min_amt');
        $furnitures->company_id              = Company::getIdForCurrentUser(request('company_id'));
        $furnitures->order_number            = request('order_number');
        $furnitures->manufacturer_id         = request('manufacturer_id');
        $furnitures->model_number            = request('model_number');
        $furnitures->purchase_date           = request('purchase_date');
        $furnitures->purchase_cost           = Helper::ParseFloat(request('purchase_cost'));
        $furnitures->qty                     = request('qty');
        $furnitures->user_id                 = Auth::user()->id;
        $furnitures->supplier_id             = request('supplier_id');

        if ($request->hasFile('image')) {

            if (!config('app.lock_passwords')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $file_name = "furnitures-".str_random(18).'.'.$ext;
                $path = public_path('/uploads/furnitures');
                if ($image->getClientOriginalExtension()!='svg') {
                    Image::make($image->getRealPath())->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path.'/'.$file_name);
                } else {
                    $image->move($path, $file_name);
                }
                $furnitures->image = $file_name;
            }
        }



        // Was the furnitures created?
        if ($furnitures->save()) {
            // Redirect to the new furnitures  page
            return redirect()->route('furnitures.index')->with('success', trans('admin/furnitures/message.create.success'));
        }
        return redirect()->back()->withInput()->withErrors($furnitures->getErrors());
    }

  /**
   * Return view for the Furnitures update form, prepopulated with existing data
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $furnituresId
   * @return View
   */
    public function edit(Request $request, $furnituresId = null)
    {

        if ($item = Furnitures::find($furnituresId)) {
            $this->authorize($item);
            $category_type = 'furnitures';
            return view('furnitures/edit', compact('item'))->with('category_type', $category_type);
        }

        return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.does_not_exist'));

    }


  /**
   * Save edited Furnitures from form post
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $furnituresId
   * @return Redirect
   */
    public function update(ImageUploadRequest $request, $furnituresId = null)
    {
        if (is_null($furnitures = Furnitures::find($furnituresId))) {
            return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.does_not_exist'));
        }

        $this->authorize($furnitures);

        // Update the furnitures data
        $furnitures->name                    = request('name');
        $furnitures->location_id             = request('location_id');
        $furnitures->min_amt                 = request('min_amt');
        $furnitures->category_id             = request('category_id');
        $furnitures->company_id              = Company::getIdForCurrentUser(request('company_id'));
        $furnitures->manufacturer_id         = request('manufacturer_id');
        $furnitures->order_number            = request('order_number');
        $furnitures->model_number            = request('model_number');
        $furnitures->purchase_date           = request('purchase_date');
        $furnitures->purchase_cost           = request('purchase_cost');
        $furnitures->qty                     = request('qty');
        $furnitures->supplier_id             = request('supplier_id');

        if ($request->hasFile('image')) {

            if (!config('app.lock_passwords')) {
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $file_name = "furnitures-".str_random(18).'.'.$ext;
                $path = public_path('/uploads/furnitures');
                if ($image->getClientOriginalExtension()!='svg') {
                    Image::make($image->getRealPath())->resize(null, 250, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($path.'/'.$file_name);
                } else {
                    $image->move($path, $file_name);
                }
                if (($furnitures->image) && (file_exists($path.'/'.$furnitures->image))) {
                    unlink($path.'/'.$furnitures->image);
                }

                $furnitures->image = $file_name;
            }
        }


        // Was the furnitures updated?
        if ($furnitures->save()) {
            return redirect()->route('furnitures.index')->with('success', trans('admin/furnitures/message.update.success'));
        }
        return redirect()->back()->withInput()->withErrors($furnitures->getErrors());
    }

  /**
   * Delete the given furnitures.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $furnituresId
   * @return Redirect
   */
    public function destroy(Request $request, $furnituresId)
    {
        if (is_null($furnitures = Furnitures::find($furnituresId))) {
            return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.not_found'));
        }

        $this->authorize($furnitures);


        if ($furnitures->hasUsers() > 0) {
             return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.assoc_users', array('count'=> $furnitures->hasUsers())));
        }
        $furnitures->delete();
        return redirect()->route('furnitures.index')->with('success', trans('admin/furnitures/message.delete.success'));
    }



  /**
  * Returns a view that invokes the ajax table which  contains
  * the content for the furnitures detail view, which is generated in getDataView.
  *
  * @author [A. Gianotto] [<snipe@snipe.net>]
  * @param  int  $furnituresID
  * @see AccessoriesController::getDataView() method that generates the JSON response
  * @since [v1.0]
  * @return View
  */
    public function show(Request $request, $furnituresID = null)
    {
        $furnitures = Furnitures::find($furnituresID);
        $this->authorize('view', $furnitures);
        if (isset($furnitures->id)) {
            return view('furnitures/view', compact('furnitures'));
        }
        return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.does_not_exist', compact('id')));
    }

  /**
   * Return the form to checkout an Furnitures to a user.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $furnituresId
   * @return View
   */
    public function getCheckout(Request $request, $furnituresId)
    {
        // Check if the furnitures exists
        if (is_null($furnitures = Furnitures::find($furnituresId))) {
            // Redirect to the furnitures management page with error
            return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.not_found'));
        }

        if ($furnitures->category) {

            $this->authorize('checkout', $furnitures);

            // Get the dropdown of users and then pass it to the checkout view
            return view('furnitures/checkout', compact('furnitures'));
        }

        return redirect()->back()->with('error', 'The category type for this furnitures is not valid. Edit the furnitures and select a valid furnitures category.');



    }

  /**
   * Save the Furnitures checkout information.
   *
   * If Slack is enabled and/or asset acceptance is enabled, it will also
   * trigger a Slack message and send an email.
   *
   * @author [A. Gianotto] [<snipe@snipe.net>]
   * @param  int  $furnituresId
   * @return Redirect
   */
    public function postCheckout(Request $request, $furnituresId)
    {
      // Check if the furnitures exists
        if (is_null($furnitures = Furnitures::find($furnituresId))) {
            // Redirect to the furnitures management page with error
            return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.user_not_found'));
        }

        $this->authorize('checkout', $furnitures);

        if (!$user = User::find(Input::get('assigned_to'))) {
            return redirect()->route('checkout/furnitures', $furnitures->id)->with('error', trans('admin/furnitures/message.checkout.user_does_not_exist'));
        }

      // Update the furnitures data
        $furnitures->assigned_to = e(Input::get('assigned_to'));

        $furnitures->users()->attach($furnitures->id, [
            'furnitures_id' => $furnitures->id,
            'created_at' => Carbon::now(),
            'user_id' => Auth::id(),
            'assigned_to' => $request->get('assigned_to')
        ]);

        $logaction = $furnitures->logCheckout(e(Input::get('note')), $user);

        DB::table('furnitures_users')->where('assigned_to', '=', $furnitures->assigned_to)->where('furnitures_id', '=', $furnitures->id)->first();

        $data['log_id'] = $logaction->id;
        $data['eula'] = $furnitures->getEula();
        $data['first_name'] = $user->first_name;
        $data['item_name'] = $furnitures->name;
        $data['checkout_date'] = $logaction->created_at;
        $data['item_tag'] = '';
        $data['expected_checkin'] = '';
        $data['note'] = $logaction->note;
        $data['require_acceptance'] = $furnitures->requireAcceptance();

      // Redirect to the new furnitures page
        return redirect()->route('furnitures.index')->with('success', trans('admin/furnitures/message.checkout.success'));
    }


    /**
     * Check the furnitures back into inventory
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param Request $request
     * @param integer $furnituresUserId
     * @param string $backto
     * @return View
     * @internal param int $furnituresId
     */
    public function getCheckin(Request $request, $furnituresUserId = null, $backto = null)
    {
        // Check if the furnitures exists
        if (is_null($furnitures_user = DB::table('furnitures_users')->find($furnituresUserId))) {
            // Redirect to the furnitures management page with error
            return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.not_found'));
        }

        $furnitures = Furnitures::find($furnitures_user->furnitures_id);
        $this->authorize('checkin', $furnitures);
        return view('furnitures/checkin', compact('furnitures'))->with('backto', $backto);
    }


    /**
     * Check in the item so that it can be checked out again to someone else
     *
     * @uses Furnitures::checkin_email() to determine if an email can and should be sent
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param Request $request
     * @param integer $furnituresUserId
     * @param string $backto
     * @return Redirect
     * @internal param int $furnituresId
     */
    public function postCheckin(Request $request, $furnituresUserId = null, $backto = null)
    {
      // Check if the furnitures exists
        if (is_null($furnitures_user = DB::table('furnitures_users')->find($furnituresUserId))) {
            // Redirect to the furnitures management page with error
            return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.does_not_exist'));
        }

        $furnitures = Furnitures::find($furnitures_user->furnitures_id);

        $this->authorize('checkin', $furnitures);

        $return_to = e($furnitures_user->assigned_to);
        $logaction = $furnitures->logCheckin(User::find($return_to), e(Input::get('note')));

        // Was the furnitures updated?
        if (DB::table('furnitures_users')->where('id', '=', $furnitures_user->id)->delete()) {
            if (!is_null($furnitures_user->assigned_to)) {
                $user = User::find($furnitures_user->assigned_to);
            }

            $data['log_id'] = $logaction->id;
            $data['first_name'] = e($user->first_name);
            $data['last_name'] = e($user->last_name);
            $data['item_name'] = e($furnitures->name);
            $data['checkin_date'] = e($logaction->created_at);
            $data['item_tag'] = '';
            $data['note'] = e($logaction->note);

            if ($backto=='user') {
                return redirect()->route("users.show", $return_to)->with('success', trans('admin/furnitures/message.checkin.success'));
            }
            return redirect()->route("furnitures.show", $furnitures->id)->with('success', trans('admin/furnitures/message.checkin.success'));
        }
        // Redirect to the furniture management page with error
        return redirect()->route('furnitures.index')->with('error', trans('admin/furnitures/message.checkin.error'));
    }


}
