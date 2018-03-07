<?php

Route::group(['prefix' => 'api/dpp-bank-dunia', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@index',
        'create'    => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@create',
        'show'      => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@show',
        'store'     => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@store',
        'edit'      => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@edit',
        'update'    => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@update',
        'destroy'   => 'Bantenprov\DPPBankDunia\Http\Controllers\DPPBankDuniaController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('dpp-bank-dunia.index');
    Route::get('/create',       $controllers->create)->name('dpp-bank-dunia.create');
    Route::get('/{id}',         $controllers->show)->name('dpp-bank-dunia.show');
    Route::post('/',            $controllers->store)->name('dpp-bank-dunia.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('dpp-bank-dunia.edit');
    Route::put('/{id}',         $controllers->update)->name('dpp-bank-dunia.update');
    Route::delete('/{id}',      $controllers->destroy)->name('dpp-bank-dunia.destroy');
});
