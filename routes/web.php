<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


# Default Routes
Route::get('/', function () {
    return view('home_updated');
});

Route::get('about', function () {
    return view('about');
});

Route::view("complaints-policy", "complaints");
Route::view("terms-and-conditions", "terms");
Route::view("privacy-policy", "policy");
# Authenticated Routes
Auth::routes();

Route::get('/customer/login', function () {
    return view('auth.customerlogin');
});
Route::any('testMail', 'HomeController@testMail');

Route::middleware('auth')->group(function () {
    Route::get('clinics/{id}/notifications', 'ClinicController@notifications');
    Route::get('clinics/{id}/additional', 'ClinicController@additional');
    Route::get('clinics/{id}/orders', 'ClinicController@getOrders');
    Route::post('clinics/approve', 'ClinicController@approve')->name('clinics.approve');
    Route::post('clinics/url', 'ClinicController@url')->name('clinics.url');
    Route::post('clinics/visible', 'ClinicController@visible')->name('clinics.visible');

    Route::get('clinics/{id}/company-details', 'ClinicController@companyDetailsAdmin')->name('clinics.companyDetails');
    Route::get('companydetails/downloadForm/{id}', 'CompanyDetailsController@downloadForm')->name('companydetails.downloadForm');
    Route::get('companydetails/approve/{id}', 'CompanyDetailsController@approve')->name('companydetails.approve');
    Route::post('companydetails/disapprove/{id}', 'CompanyDetailsController@disApprove')->name('companydetails.disapprove');
    Route::resource('companydetails', CompanyDetailsController::class);


    Route::get('clinics/{id}/iar-training/take-quiz', 'IarTrainingController@takeQuiz')->name('iartraining.takequiz');
    Route::get('clinics/{id}/iar-training/thank-you', 'IarTrainingController@thankYou')->name('iartraining.thankyou');
    Route::get('clinics/{id}/iar-training', 'IarTrainingController@index')->name('iartraining');
    Route::post('iartraining/sendNotification', 'IarTrainingController@sendNotification')->name('iartraining.sendNotification');
    Route::post('iartraining/confirmReviewedInfo', 'IarTrainingController@confirmReviewedInfo')->name('iartraining.confirmReviewedInfo');
    Route::resource('clinics/iartraining', IarTrainingController::class);
    

    Route::get('signcontract/downloadForm/{id}', 'SignContractController@downloadForm')->name('signcontract.downloadForm');
    Route::resource('clinics/signcontract', SignContractController::class);

    # Document Routes
    Route::get('clinics/{id}/documents', 'ClinicController@showDocuments');
    Route::resource('documents', 'DocumentController');
});

# Clinic Routes

Route::post('clinic-waitlist', 'ClinicController@storeWaitList')->name('clinics.waitlist');

Route::get('clinics/reset_hash', 'ClinicController@reset_hash');
Route::get('clinics/request', 'ClinicController@request');
Route::post('clinics/payment', 'StripeController@payWithStripe')->name('clinics.payment');
Route::get('clinics/payment', 'StripeController@payWithStripe')->name('clinics.payment');
Route::post('clinics/search', 'ClinicController@search')->name('clinics.search');
Route::post('stripe/payment', 'StripeController@postPaymentWithStripe')->name('stripe.payment');
Route::get('stripe/thanks', function () {
    return view('stripe.thanks');
})->name('stripe.thanks');
Route::post('/clinics', 'ClinicController@index');
Route::post('clinics/reviewedinformation/{id}', 'ClinicController@reviewedInformation')->name('clinics.reviewedinformation');
Route::resource('clinics', 'ClinicController');

Route::get('company-details', 'ClinicController@companyDetailsDirect');
Route::get('company-details/{link}', 'ClinicController@companyDetails');
Route::post('store-company-details/{link}', 'ClinicController@storeCompanyDetails')->name('store.companyDetails');
Route::get('paypal/thanks', function () {
    return view('paypal.thank-you');
})->name('paypal.thanks');
# Start Paypal

//Route::get('/', 'PaypalController@index');
// Route::get('paypal', 'PaypalController@payWithpaypal');
Route::post('select-payment', 'PaypalController@payWithpaypal')->name('clinics.paypal');
Route::post('paypal', 'PaypalController@createSubscription')->name('paypal.payment');
Route::get('status', 'PaypalController@getPaymentStatus')->name('paypal.status');
Route::get('return', 'PaypalController@getPaymentReturn')->name('paypal.return');
Route::get('cancel', 'PaypalController@getPaymentCancel')->name('paypal.cancel');
Route::post('payment/success', 'PaypalController@paymentSuccess')->name('paypal.success');
# End Paypal

# Free users
Route::post('freeusers/add', 'FreeUserController@add')->name('freeusers.add');

#EQUIPMENT FINANCE
Route::get('equipment-finance/{product}', 'EquipmentFinanceController@financeProduct')->name('product.finance');
Route::get('download-equipment-finance/{id}', 'EquipmentFinanceController@downloadFinanceInquiryData')->name('download.finance');
Route::resource('equipment-finance', EquipmentFinanceController::class);

# Calculator Routes
Route::get('finance', function () {
    return view('calculator.index');
});
Route::post('calculator/{amount}', function ($amount) {
    return view('calculator.index')->with(['amount' => $amount]);
});

# catalogue Routes
Route::get('catalogue', function () {
    return view('catalogue.index');
});

Route::get('medical-device/{category}', function ($category) {
    return view('catalogue.skin',compact('category'));
});

Route::get('medical-device/{category}/{device}', function ($category,$device) {
    return view('catalogue.single-product',compact('category','device'));
});

# Contact Routes
Route::get('contact', function () {
    return view('contact.index');
});
Route::post('contact/send', function () {
    return view('contact.index');
})->name('contact.send');

# Service Routes
Route::resource('services', 'ServiceController');

# Buying Option Routes
Route::resource('buyingoptions', 'BuyingOptionController');

# Qualification Routes
Route::resource('qualifications', 'QualificationController');

# Email Test
Route::get('email', function () {
    return view('emails.notification');
});

# Category Routes
Route::resource('categories', 'CategoryController');

# Checkout Routes
Route::get('checkout', 'CheckoutController@index')->name('checkout');
Route::post('checkout/complete', 'CheckoutController@complete');
Route::get('checkout/thanks', 'CheckoutController@thanks');

# Notification Routes
Route::resource('admin/notifications', 'MessageController');
Route::post('message', 'MessageController@store')->name('message.store');
Route::post('notification/read', 'MessageController@read')->name('message.read');
Route::post('notification/all/read', 'MessageController@allRead')->name('message.allread');

# Basket Routes
Route::get('basket/', 'BasketController@index');
Route::post('basket/add', 'BasketController@add')->name('basket.add');
Route::get('basket/empty', 'BasketController@destroy')->name('basket.destroy');
Route::post('basket/update', 'BasketController@update')->name('basket.update');
Route::post('basket/remove', 'BasketController@remove')->name('basket.remove');

# FAQ Routes
Route::resource('faq', 'FaqController');

# Eqnuiry Routes
Route::get("/enquiries/resolve/{id}", function ($id) {
    $enquiry = App\Enquiry::findorfail($id);
    $enquiry->status = 1;
    $enquiry->save();

    return redirect()->back();
});

Route::get("/enquiries/unresolve/{id}", function ($id) {
    $enquiry = App\Enquiry::findorfail($id);
    $enquiry->status = 0;
    $enquiry->save();

    return redirect()->back();
});


Route::resource('enquiries', 'EnquiryController');
Route::post('/contact/general', 'EnquiryController@saveGeneralEnquiry')->name('contact.general');
Route::post('/contact/clinic', 'EnquiryController@saveClinicEnquiry')->name('contact.clinic');

# Admin Routes
Route::middleware('admin')->group(function () {
    # Admin routes
    Route::get('admin', function () {
        return view('admin.index');
    });

    # Ajax partials
    Route::get('admin/orders', function () {
        $orders = App\Order::where("status", "!=", "Cart")->where("status", "!=", "ABANDONED")->paginate(15);

        return view("admin.orders")->with(["orders" => $orders]);
    });

    Route::get('admin/enquiries/{filter?}', function ($filter = null) {
        if ($filter == null) {

            $enquiries = App\Enquiry::orderBy('created_at', 'desc')->paginate(15);
        } elseif ($filter == "read") {
            $enquiries = App\Enquiry::orderBy('created_at', 'desc')->where('status', '=', '1')->paginate(15);
        } else {
            $enquiries = App\Enquiry::orderBy('created_at', 'desc')->where('status', '=', '0')->paginate(15);
        }

        return view("admin.enquiries")->with(["enquiries" => $enquiries]);
    });

    Route::get('admin/waitlist', function () {

        $waitlist = App\ClinicSignupWaitList::orderBy('created_at', 'desc')->paginate(15);

        return view("admin.waitlist")->with(["waitlist" => $waitlist]);
    });

    Route::get('admin/finance-enquiries', function () {

        $EquipmentFinance = App\EquipmentFinance::orderBy('created_at', 'desc')->paginate(15);

        return view("admin.equipment-finance")->with(["EquipmentFinances" => $EquipmentFinance]);
    });

    # templates Routes
    Route::resource('admin/templates', 'TemplateController');

    Route::get('admin/{name}', function ($name) {
        $data = [
            "categories" => App\Category::all(),
            "clinics"    => App\Clinic::all(),
            "services"   => App\Service::all(),
            'users'      => App\User::all()->where('clinic_id', '0'),
            "faqs"       => App\Faq::all()
        ];

        return view("admin.$name")->with($data);
    });
});

# GainCredit Routes
Route::get('gaincredit/loan_products/{loan_amount}', 'GainCreditController@loan_products');
Route::post('gaincredit/applications', 'GainCreditController@applications');
Route::post('gaincredit/applicationsHard', 'GainCreditController@applicationsHard');
Route::post('gaincredit/cardSubmitted', 'GainCreditController@cardSubmitted');
Route::post('gaincredit/loanexplanationaccepted', 'GainCreditController@loanexplanationaccepted');
Route::post('gaincredit/eSignRequest', 'GainCreditController@eSignRequest');
Route::get('gaincredit/checkcartstatuses', 'GainCreditController@checkcartstatuses');

Route::get('practioner-information', 'LandingPageController@index');
