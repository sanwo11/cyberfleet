<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function welcome()
    {
        $xml = "<;;?xml version=\"1.0\" encoding=\"UTF-8\"?>;;<;;questionList>;;<;;question>;;<;;index>;;1<;;/index>;;<;;question>;;I like questions asked<;;/question>;;<;;isMultiChoice>;;1<;;/isMultiChoice>;;<;;correctOption>;;1<;;/correctOption>;;<;;options>;;<;;option>;;<;;index>;;1<;;/index>;;<;;optionText>;;Yes<;;/optionText>;;<;;/option>;;<;;option>;;<;;index>;;2<;;/index>;;<;;optionText>;;No<;;/optionText>;;<;;/option>;;<;;/options>;;<;;/question>;;<;;question>;;<;;index>;;2<;;/index>;;<;;question>;;We need to test this<;;/question>;;<;;isMultiChoice>;;1<;;/isMultiChoice>;;<;;correctOption>;;2<;;/correctOption>;;<;;options>;;<;;option>;;<;;index>;;1<;;/index>;;<;;optionText>;;No we dont<;;/optionText>;;<;;/option>;;<;;option>;;<;;index>;;2<;;/index>;;<;;optionText>;;Who cares<;;/optionText>;;<;;/option>;;<;;option>;;<;;index>;;3<;;/index>;;<;;optionText>;;Coloured Lizards<;;/optionText>;;<;;/option>;;<;;/options>;;<;;/question>;;<;;/questionList>;;";
        $xml = str_replace(";", "", $xml);

        $jsonData = collect(json_decode(json_encode((array) simplexml_load_string($xml)), true));

        return view('welcome', ['questions' => $jsonData]);
    }

}