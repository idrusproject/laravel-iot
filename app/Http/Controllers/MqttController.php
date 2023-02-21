<?php

namespace App\Http\Controllers;
use PhpMqtt\Client\Facades\MQTT;
use App\Models\Mqtt_message;
use App\Models\Mqtt_custom_message;

use Illuminate\Http\Request;

class MqttController extends Controller
{
    public function toggle_relays(Request $request)
    {
        $relays = array(
            $relay1 = $request->input('relay1', 'off'),
            $relay2 = $request->input('relay2', 'off'),
            $relay3 = $request->input('relay3', 'off'),
            $relay4 = $request->input('relay4', 'off'),
        );
        
        for ($i = 1; $i <= count($relays); $i++){
            $relay = "relay" . $i;
            $payload = ($$relay == 'on') ? 'on' : 'off';
            MQTT::publish('idrussepti/' . $relay, $payload);
        }
       
        $message = new Mqtt_message;
        $message->topic = 'idrussepti/relay1';
        $message->relay1 = $relay1;
        $message->relay2 = $relay2;
        $message->relay3 = $relay3;
        $message->relay4 = $relay4;
        $message->save();

        return redirect()->back()->with('mqtt-notif1', 'MQTT message published successfully.');
    }

    public function publishCustom(Request $request)
    {
        $topic = $request->input('topic');
        $customData = $request->input('custom_data');
        
        MQTT::connection()->publish('idrus/septi', $customData);
        $message = new Mqtt_custom_message;
        $message->topic = $topic;
        $message->message = $customData;
        $message->save();
        return redirect()->back()->with('mqtt-notif2', 'MQTT Custom message published successfully.');
    }
}
