<?php

Route::group(['middleware' => 'web','prefix' => 'admin'], function () {

	Route::get('/', [
        'uses' => 'Admin\Admincontroller@get_admin_home',
        'as' => '/',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('/dashboard', [
        'uses' => 'Admin\Admincontroller@get_admin_home',
        'as' => '/dashboard',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('browse-patterns', [
        'uses' => 'Admin\Productscontroller@my_products',
        'as' => 'browse-patterns',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('browse-patterns/{type}', [
        'uses' => 'Admin\Productscontroller@my_products',
        'as' => 'browse-patterns/{type}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('add-new-pattern', [
        'uses' => 'Admin\Productscontroller@add_new_pattern',
        'as' => 'add-new-pattern',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('upload-image', [
        'uses' => 'Admin\Productscontroller@upload_image',
        'as' => 'upload-image',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('product-images', [
        'uses' => 'Admin\Productscontroller@product_images',
        'as' => 'product-images',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('upload-product', [
        'uses' => 'Admin\Productscontroller@upload_product',
        'as' => 'upload-product',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('products-edit/{pid}', [
        'uses' => 'Admin\Productscontroller@edit_product',
        'as' => 'products-edit/{pid}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('delete-product-image/{id}', [
        'uses' => 'Admin\Productscontroller@delete_product_image',
        'as' => 'delete-product-image/{id}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('update-product', [
        'uses' => 'Admin\Productscontroller@update_product',
        'as' => 'update-product',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('remove-pattern/{id}', [
        'uses' => 'Admin\Productscontroller@remove_pattern',
        'as' => 'remove-pattern/{id}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('delete-product/{id}', [
        'uses' => 'Admin\Productscontroller@delete_product',
        'as' => 'delete-product/{id}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('product-measurements/{id}', [
        'uses' => 'Admin\Productscontroller@product_measurements',
        'as' => 'product-measurements/{id}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('measurement-add/{pid}', [
        'uses' => 'Admin\Productscontroller@measurement_add',
        'as' => 'measurement-add/{pid}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('insert-measurements', [
        'uses' => 'Admin\Productscontroller@insert_measurements',
        'as' => 'insert-measurements',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('create-measurimage', [
        'uses' => 'Admin\Productscontroller@upload_measurement_image',
        'as' => 'create-measurimage',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('edit-measurement/{id}', [
        'uses' => 'Admin\Productscontroller@edit_measurement',
        'as' => 'edit-measurement/{id}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('update-measurements', [
        'uses' => 'Admin\Productscontroller@update_measurements',
        'as' => 'update-measurements',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('delete-measurement/{id}', [
        'uses' => 'Admin\Productscontroller@delete_measurement',
        'as' => 'delete-measurement/{id}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::get('create-pattern/{pid}',[
        'uses' => 'Admin\Productscontroller@create_pattern',
        'as' => 'create-pattern/{pid}',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('create-pattern-pdf',[
        'uses' => 'Admin\Productscontroller@create_pattern_pdf',
        'as' => 'create-pattern-pdf',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('remove-product-image',[
        'uses' => 'Admin\Productscontroller@remove_product_image',
        'as' => 'remove-product-image',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::post('add-pattern-instructions',[
        'uses' => 'Admin\Productscontroller@add_pattern_instructions',
        'as' => 'add-pattern-instructions',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

	
});