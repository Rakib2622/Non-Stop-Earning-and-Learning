<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SelecteduserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/inactive_dashboard', function () {
    return view('frontend.after_login.inactive_dashboard');
})->middleware(['auth','verified'])->name('inactive_dashboard');

Route::middleware(['auth', 'is_active'])->group(function () {
    
    Route::get('/showprofile', [ProfileController::class, 'showProfile'])->name('showprofile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/updateprofile', [ProfileController::class, 'updateProfile'])->name('profile.update');

    // User routes
    Route::get('user/products', [UserProductController::class, 'productlist'])->name('user.products');
    Route::get('user/products/{id}', [UserProductController::class, 'show_product_details'])->name('user.product.details');
    Route::get('user/orders', [UserProductController::class, 'view_orders'])->name('user.orders');
    Route::get('user/cart', [UserProductController::class, 'view_cart'])->name('user.cart');
    Route::post('user/products/{id}/order', [UserProductController::class, 'order_now'])->name('user.product.order');
    Route::post('user/products/{id}/cart', [UserProductController::class, 'add_to_cart'])->name('user.product.cart');



    // User routes for viewing courses and classes
    Route::get('courses', [CourseController::class, 'userCourseList'])->name('user.courses');
    Route::get('courses/{id}', [CourseController::class, 'userCourseDetails'])->name('user.course.details');
    Route::get('courses/{course_id}/classes', [CourseController::class, 'userClassList'])->name('user.classes');



    Route::get('dashboard', [CourseController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return view('frontend.after_login.dashboard');
    // })->name('dashboard');

    // Route::get('/courses', function () {
    //     return view('frontend.after_login.courses');
    // })->name('courses');
    
    Route::get('/references', function () {
        return view('frontend.after_login.references');
    })->name('references');
    
    Route::get('/passbook', function () {
        return view('frontend.after_login.passbook');
    })->name('passbook');
    
    // Route::get('/product', function () {
    //     return view('frontend.after_login.product');
    // })->name('product');
    
    
    Route::get('/affiliate', function () {
        return view('frontend.after_login.affiliate');
    })->name('affiliate');
    
    
    Route::get('/enroll', function () {
        return view('frontend.after_login.enroll');
    })->name('enroll');
    
    Route::get('/change_password', function () {
        return view('frontend.after_login.change_password');
    })->name('change_password');
    
    Route::get('/withdrawal', function () {
        return view('frontend.after_login.withdrawal');
    })->name('withdrawal');
});

Route::get('/',[HomeController::class, 'index'])->name('home');




Route::get('/products', [HomeController::class, 'showProducts'])->name('products');
Route::get('/products/{id}', [HomeController::class, 'showProductDetails'])->name('home.product.details');
// web.php
Route::get('/products/{id}/buy-now', [HomeController::class, 'buyNowPage'])->name('home.product.buyNow');

Route::post('/products/{id}/order', [HomeController::class, 'orderProduct'])->name('home.product.order');


// Route::get('/products', function () {
//     return view('frontend.products');
// })->name('products');

// Route::get('/product_details', function () {
//     return view('frontend.product_details');
// })->name('product_details');

Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');


Route::get('/loginpage', function () {
    return view('frontend.loginpage');
})->name('loginpage');

Route::get('/cheackout', function () {
    return view('frontend.cheackout');
})->name('cheackout');

// Course route
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

// Contact route
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

//quick link
Route::get('/faqs', function () {
    return view('frontend.quick_link.faqs');
})->name('faqs');

Route::get('/terms', function () {
    return view('frontend.quick_link.terms');
})->name('terms');




//admin


Route::prefix('admin')->middleware(['auth:admin', 'role'])->group(function () {

    // Profile routes
    Route::get('/showprofile', [ProfileController::class, 'adminshowProfile'])->name('admin.showprofile');
    Route::get('/profile', [ProfileController::class, 'adminedit'])->name('admin.profile.edit');
    Route::patch('/updateprofile', [ProfileController::class, 'adminupdateProfile'])->name('admin.profile.update');

    // Student routes with student_list_access middleware
        Route::get('students', [AdminController::class, 'studentlist'])->name('admin.students');
        Route::get('students/{id}', [AdminController::class, 'editStudent'])->name('admin.students.edit');
        Route::put('students/{id}', [AdminController::class, 'updateStudent'])->name('admin.students.update');

    // Role management routes with role_list_access middleware
    
        Route::get('roles', [SelecteduserController::class, 'rolelist'])->name('admin.roles');
        Route::get('roles/create', [SelecteduserController::class, 'insertpage'])->name('admin.role.insert');
        Route::post('roles', [SelecteduserController::class, 'insert'])->name('admin.insert.role');
        Route::get('roles/{id}/edit', [SelecteduserController::class, 'edit_role_page'])->name('admin.role.edit');
        Route::put('roles/{id}', [SelecteduserController::class, 'update_role_page'])->name('admin.role.update');
        Route::delete('roles/{id}', [SelecteduserController::class, 'delete'])->name('admin.role.delete');
    

    // Admin user management routes with user_list_access middleware
    
        Route::get('admins', [SelecteduserController::class, 'adminlist'])->name('admin.userlist');
        Route::get('admins/create', [SelecteduserController::class, 'admininsertpage'])->name('admin.insert.page');
        Route::post('admins', [SelecteduserController::class, 'admininsert'])->name('admin.insert');
        Route::get('admins/{id}/edit', [SelecteduserController::class, 'edit_admin_page'])->name('admin.edit');
        Route::put('admins/{id}', [SelecteduserController::class, 'update_admin_page'])->name('admin.update');
        Route::delete('admins/{id}', [SelecteduserController::class, 'admindelete'])->name('admin.delete');
    

    // Course management routes with course_list_access middleware
        Route::get('courses', [CourseController::class, 'courselist'])->name('admin.courses');
        Route::get('courses/create', [CourseController::class, 'insert_course_page'])->name('admin.course.insert');
        Route::post('courses', [CourseController::class, 'insert_course'])->name('admin.insert.course');
        Route::get('courses/{id}/edit', [CourseController::class, 'edit_course_page'])->name('admin.course.edit');
        Route::put('courses/{id}', [CourseController::class, 'update_course'])->name('admin.course.update');
        Route::delete('courses/{id}', [CourseController::class, 'delete_course'])->name('admin.course.delete');

        // Class management within courses
        Route::get('courses/{course_id}/classes', [CourseController::class, 'classlist'])->name('admin.classes');
        Route::get('courses/{course_id}/classes/create', [CourseController::class, 'insert_class_page'])->name('admin.class.insert');
        Route::post('courses/{course_id}/classes', [CourseController::class, 'insert_class'])->name('admin.insert.class');
        Route::get('courses/{course_id}/classes/{class_id}/edit', [CourseController::class, 'edit_class_page'])->name('admin.class.edit');
        Route::put('courses/{course_id}/classes/{class_id}', [CourseController::class, 'update_class'])->name('admin.class.update');
        Route::delete('courses/{course_id}/classes/{class_id}', [CourseController::class, 'delete_class'])->name('admin.class.delete');
    

    // Product management routes with product_list_access middleware
    
        Route::get('products', [ProductController::class, 'productlist'])->name('admin.products');
        Route::get('products/create', [ProductController::class, 'insert_product_page'])->name('admin.product.insert');
        Route::post('products', [ProductController::class, 'insert_product'])->name('admin.store.product');
        Route::get('products/{id}/edit', [ProductController::class, 'edit_product_page'])->name('admin.product.edit');
        Route::get('products/{id}', [ProductController::class, 'show_product_details'])->name('admin.product.details');
        Route::put('products/{id}', [ProductController::class, 'update_product'])->name('admin.product.update');
        Route::delete('products/{id}', [ProductController::class, 'delete_product'])->name('admin.product.delete');

    // Orders management route with product_list_access middleware (if orders relate to products)
    Route::get('orders', [ProductController::class, 'order'])->name('admin.orders');
});



























require __DIR__.'/auth.php';

require __DIR__.'/adminauth.php';