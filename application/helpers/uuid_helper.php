<?php
if (!function_exists('uuid_v4')) {
    /**
     * Generate UUID v4
     *
     * @return string
     */
    function uuid_v4() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', // format as a GUID
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 12 bits before the 0100 of (version) 4 for "time_hi_and_version"
            mt_rand(0, 0x0fff) | 0x4000,
            // 8 bits, the last two of which (positions 6 and 7) are 01, for "clk_seq_hi_res"
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
