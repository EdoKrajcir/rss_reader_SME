<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RSScontroller extends Controller
{
    //

    public function search(Request $request)
    {
        $url = request()->input('query');
        $entries = array();
        $xml = simplexml_load_file($url);
        $entries = $xml->xpath("//item");
        return view('testreader')->with('entries',$entries);
    }

    public function date_desc(Request $request)
    {
       $url = request()->input('query');

            $entries = array();
            $xml = simplexml_load_file($url);
            $entries = $xml->xpath("//item");

            //Sort feed entries by pubDate
            usort($entries, function ($feed1, $feed2) {
                return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
            });
            return view('testreader')->with('entries',$entries)->with('sort','DSC');
    }

    public function date_asc(Request $request)
    {
       $url = request()->input('query');

            $entries = array();
            $xml = simplexml_load_file($url);
            $entries = $xml->xpath("//item");

            //Sort feed entries by pubDate
            usort($entries, function ($feed1, $feed2) {
                return strtotime($feed1->pubDate) - strtotime($feed2->pubDate);
            });
            return view('testreader')->with('entries',$entries)->with('sort','ASC');
    }
}
