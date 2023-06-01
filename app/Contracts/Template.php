<?php

namespace App\Contracts;

interface Template
{
    /**
     * Display Developer's Personal Data like name, phones, address.
     *
     * @return \Illuminate\Http\Response
     */
    public function personalData($user_id);

    /**
     * Display Developer's Skills like technical skills and soft skills.
     *
     * @return \Illuminate\Http\Response
     */

    public function skills($user_id);

    /**
     * Display Developer's Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function technologies($user_id);

    /**
     * Display Developer's Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function features($user_id);

    /**
     * Display Developer's Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function services($user_id);

    /**
     * Display Developer's Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects($user_id);

    /**
     * Display Developer's Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function experience($user_id);

    /**
     * Display Developer's Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function websiteSettings($user_id);
}
