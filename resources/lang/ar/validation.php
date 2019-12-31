<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ' :attribute يجب أن تكون مقبولة.',
    'active_url' => ' :attribute ليس عنوان URL صالحًا.',
    'after' => ' :attribute يجب أن يكون تاريخ بعد. :date.',
    'after_or_equal' => ' :attribute يجب أن يكون تاريخ بعد أو يساوي :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => ' :attribute قد يحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => ' :attribute قد تحتوي فقط على حروف وأرقام.',
    'array' => ' :attribute يجب أن يكون مجموعة.',
    'before' => ' :attribute يجب أن يكون تاريخ من قبل:date.',
    'before_or_equal' => ' :attribute يجب أن يكون تاريخ قبل أو يساوي :date.',
    'between' => [
        'numeric' => ' :attribute يجب ان يكون بين :min and :max.',
        'file' => ' :attribute يجب ان يكون بين :min and :max كيلو بايت.',
        'string' => ' :attribute يجب ان يكون بين :min and :max الشخصيات.',
        'array' => ' :attribute يجب ان يكون بين :min and :max العناصر.',
    ],
    'boolean' => ':attribute يجب أن يكون الحقل صواب أو خطأ.',
    'confirmed' => ' :attribute التأكيد غير متطابق.',
    'date' => ' :attribute هذا ليس تاريخ صحيح.',
    'date_equals' => ' :attribute يجب أن يكون تاريخ يساوي :date.',
    'date_format' => ' :attribute لا يطابق التنسيق :format.',
    'different' => ' :attribute and :other يجب أن تكون مختلفة.',
    'digits' => ' :attribute يجب ان يكون :digits الأرقام.',
    'digits_between' => ' :attribute يجب ان يكون بين :min and :max الأرقام.',
    'dimensions' => ' :attribute له أبعاد صورة غير صالحة .',
    'distinct' => ' :attribute الحقل له قيمة مكررة.',
    'email' => ' :attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => ' :attribute يجب أن ينتهي مع واحد من following: :values',
    'exists' => '  :attribute متاح.',
    'file' => ' :attribute يجب أن يكون ملف',
    'filled' => ' :attribute يجب أن يكون الحقل قيمة.',
    'gt' => [
        'numeric' => ' :attribute يجب أن يكون أكبر من :value.',
        'file' => ' :attribute يجب أن يكون أكبر من :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أكبر من :value الشخصيات.',
        'array' => ' :attribute يجب أن يكون أكبر من :value العناصر.',
    ],
    'gte' => [
        'numeric' => ' :attribute يجب أن يكون أكبر من او يساوي  :value.',
        'file' => ' :attribute يجب أن يكون أكبر من او يساوي :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أكبر من او يساوي :value الشخصيات.',
        'array' => ' :attribute يجب ان يملك :value الشخصيات or اكثر.',
    ],
    'image' => ' :attribute يجب أن تكون صورة.',
    'in' => '  :attribute متاحة.',
    'in_array' => ' :attribute الحقل غير موجود في :other.',
    'integer' => ' :attribute يجب أن يكون صحيحا.',
    'ip' => ' :attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => ' :attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => ' :attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => ' :attribute يجب أن تكون سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => ' :attribute يجب أن يكون أقل من :value.',
        'file' => ' :attribute يجب أن يكون أقل من :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أقل من :value الشخصيات.',
        'array' => ' :attribute يجب أن يكون أقل من :value العناصر.',
    ],
    'lte' => [
        'numeric' => ' :attribute يجب أن يكون أقل من او تساوي :value.',
        'file' => ' :attribute يجب أن يكون أقل من او تساوي :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أقل من او تساوي :value الشخصيات.',
        'array' => ' :attribute يجب أن يكون أقل من او تساوي :value العناصر.',
    ],
    'max' => [
        'numeric' => ' :attributeقد لا يكون أكبر منn :max.',
        'file' => ' :attribute قد لا يكون أكبر من :max كيلو بايت.',
        'string' => ' :attribute قد لا يكون أكبر من :max الشخصيات.',
        'array' => ' :attribute قد لا يكون أكبر من :max العناصر.',
    ],
    'mimes' => ' :attribute يجب أن يكون ملف من النوع: :values.',
    'mimetypes' => ' :attribute يجب أن يكون ملف من النوع: :values.',
    'min' => [
        'numeric' => ' :attribute لا بد أن يكون على الأقل:min.',
        'file' => ' :attribute لا بد أن يكون على الأقل :min كيلو بايت.',
        'string' => ' :attribute لا بد أن يكون على الأقل :min الشخصيات.',
        'array' => ' :attribute لا بد أن يكون على الأقل :min العناصر.',
    ],
    'not_in' => ' selected :attribute متاح.',
    'not_regex' => ' :attribute التنسيق غير صالح .',
    'numeric' => ' :attribute يجب أن يكون رقماr.',
    'present' => ' :attribute يجب أن يكون الحقل حاضرا.',
    'regex' => ' :attribute التنسيق غير صالح.',
    'required' => ' :attribute الحقل مطلوب.',
    'required_if' => ' :attribute حقل مطلوب عندما :other هو :value.',
    'required_unless' => ' :attribute الحقل مطلوب ما لم :other هو :values.',
    'required_with' => ' :attribute حقل مطلوب عندما :values هو present.',
    'required_with_all' => ' :attribute حقل مطلوب عندما :values هم present.',
    'required_without' => ' :attribute حقل مطلوب عندما :values هو not present.',
    'required_without_all' => ' :attributeحقل مطلوب عندما لا شيء من :values هم present.',
    'same' => ' :attribute و :other يجب أن تطابق.',
    'size' => [
        'numeric' => ' :attribute يجب ان  :size.',
        'file' => ' :attribute يجب ان :size كيلو بايت.',
        'string' => ' :attribute يجب ان :size الشخصيات.',
        'array' => ' :attribute يجب أن تحتوي على  :size العناصر.',
    ],
    'starts_with' => ' :attribute يجب أن تبدأ مع واحد من following: :values',
    'string' => ' :attribute يجب أن يكون سلسلة.',
    'timezone' => ' :attribute يجب أن تكون منطقة صالحة.',
    'unique' => ' :attribute لقد اتخذت بالفعل.',
    'uploaded' => ' :attribute فشل في التحميل.',
    'url' => ' :attribute التنسيق غير صالح.',
    'uuid' => ' :attribute يجب أن يكون UUID صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
