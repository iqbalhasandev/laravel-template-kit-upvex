<?php

return [

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Key and Organization
    |--------------------------------------------------------------------------
    |
    | Here you may specify your OpenAI API Key and organization. This will be
    | used to authenticate with the OpenAI API - you can find your API key
    | and organization on your OpenAI dashboard, at https://openai.com.
    */

    'api_key' => env('OPENAI_API_KEY'),
    'organization' => env('OPENAI_ORGANIZATION'),
    /**
     *  OpenAi extra config
     */
    'max_number_of_result' => env('OPENAI_MAX_NUMBER_OF_RESULT', 10),
    'max_tokens' => env('OPENAI_MAX_TOKENS', 100),

];
