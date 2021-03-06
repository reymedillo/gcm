<?php

Route::any('matriphe/gcm', function() 
{
    $data = [];
    
    if (Request::has('device_id') && Request::has('gcm_id')) {
        $subject = Request::input('subject', 'Test Subject');
        $message = Request::input('message', 'Tes Message');
        $device_id = Request::input('device_id');
        $gcm_id = Request::input('gcm_id');
        
        $result = Gcm::push($device_id, $gcm_id, $subject, $message);
        
        $data['result'] = $result;
    }
    
    return view('gcm::form')->with($data);
});