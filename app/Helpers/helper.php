<?php
/**
 * Created by PhpStorm.
 * User: lockiee
 * Date: 2018/5/23
 * Time: 下午5:18
 */
if(!function_exists('getCategoriesForNaviBar')){
    function getCategoriesForNaviBar(){
        $categories = (new \App\Models\Category())->getCategoriesForNaviBar();
        return \GuzzleHttp\json_decode($categories);
    }
}