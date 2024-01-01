<?php

if (!function_exists('sizeFirst')) {
    function sizeFirst($sanpham_id, $mau_id, $size_id)
    {
        $size = DB::table('sanpham_ct')->where([
            'sanpham_id' => $sanpham_id,
            'mau_id' => $mau_id,
            'size_id' => $size_id
        ])->first();
        if ($size) {
            return true;
        }
        return false;
    }
}