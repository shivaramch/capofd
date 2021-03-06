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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',

    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

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
            'rule-name' => 'custom-message',
        ],
        'employeeid' => [
            'required' => '"Employee ID#" field is required',
            'integer' => '"Employee ID#" field should be an integer',
            ],

        'exposedemployeename' => [
            'required' => '"Exposed Employee Name" field is required',
            'alpha' => '"Exposed Employee Name" can only have letters',
        ],
        'dateofexposure' => [
            'required' => '"Date of Exposure" field is required',
           'date' => '"Date of Exposure" should be a date',
        ],
        'assignmentbiological' => [
            'required' => '"Assignment" field is required',
        ],
        'shift' => [
            'required' => '"Shift" field is required',
        ],
        'primaryidconumber' => [
            'required' => '"Primary IDCO#" field is required',
            'integer' => '"Primary IDCO#" field should be an integer',
        ],
        'epcrincidentnum' => [
            'required' => '"EPCR Incident#" field is required',
            'integer' => '"EPCR Incident#" field should be a integer',
        ],
        'frmsincidentnum' => [
            'required' => '"FRMS Incident#" field is required',
            'integer' => '"FRMS Incident#" field should be a number',
        ],
        'exposureinjury' => [
            'required' => 'Select Yes or No for "Do you have any symptoms of illness or injury and require treatment?"',
        ],
        'exposure' => [
            'required' => '"Please Select True Exposure or Potential Exposure radio button"',
        ],
        'reportnum' => [
            'required' => '"Report#" field is required',
            'integer' => '"Report#" field should be a integer',
        ],
        'injurydate' => [
            'required' => '"Date of Injury" field is required',
            'date' => '"Date of Injury" field should be a valid date',
            'before_or_equal' => '"Date of Injury" field should be a Today or a past date - No future dates are allowed',
        ],
        'injuredemployeename' => [
            'required' => '"Injured Name" field is required',
            'string' => '"Injured Name" field can only have letters',
        ],
        'injuredemployeeid' => [
        'required' => '"Personnel ID #" field is required',
        'integer' => '"Personnel ID #" field should be an integer',
        ],
        'assignmentinjury' => [
        'required' => '"Assignment" field is required',
        ],
        'corvelid' => [
            'required' => '"CorVel ID #" field is required',
            'integer' => '"CorVel ID #" field should be an integer',
        ],
        'captainid' => [
            'required' => '"Captain#" field is required',
            'integer' => '"Captain#" field should be an integer',
        ],
        'battalionchiefid' => [
            'required' => '"Battalion Chief#" field is required',
            'integer' => '"Battalion Chief#" field should be an integer',
        ],
        'aconduty' => [
            'required' => '"Assistant Chief#" field is required',
            'integer' => '"Assistant Chief#" field should be an integer',
        ],
        'trainingassigned' => [
            'required' => 'Select Yes or No for "In case attend Omaha Police Academy - Training Assigned" drop down',
        ],
        'documentworkforce' => [
            'required' => 'Check "Document IOD in Workforce - Only if seeking medical attention" checkbox',
        ],
        'documentoperationalday' => [
            'required' => 'Check "Document in Operational Day Book and Personnel Record" checkbox',
        ],
        'policeofficercompletesign' => [
            'required' => 'Check "Have Police Supervisor Complete and Sign Supervisor section on Investigation Report and Witness Statement" checkbox',
        ],
        'callsupervisor' => [
            'required' => 'Check "Call Fire Supervisor or SWD B/C immediately and notify CorVel by phone" checkbox',
        ],
        'accidentdate' => [
            'required' => '"Date of Accident" field is required',
            'date' => '"Date of Accident" field should be a valid date',
            'before_or_equal' => '"Accident Date" field should be a Today or a past date - No future dates are allowed',
        ],
        'driverid' => [
            'required' => '"Driver ID#" field is required',
            'integer' => '"Driver ID#" field should be an integer',
        ],
        'drivername' => [
            'required' => '"Driver Name" field is required',
            'alpha' => '"Driver Name" can only have letters',
        ],
        'assignmentaccident' => [
            'required' => '"Assignment" field is required',
        ],
        'apparatus' => [
            'required' => '"Apparatus" field is required',
        ],
        'calllaw' => [
            'required' => 'Check "Call Law Department Investigator- Call 444-5131- Request report be faxed to SWD fax # 444-6378" checkbox',
        ],
        'daybook' => [
            'required' => 'Check "Enter in Company Day Book" checkbox',
        ],
        'commemail' => [
            'required' => 'Check "Generate OFD 025 Intradepartmental Communication-Email" checkbox',
        ],
        'employeename' => [
            'required' => '"Exposed Employee Name" field is required',
            'alpha' => '"Exposed Employee Name" can only have letters',
        ],
        'assignment' => [
            'required' => '"Assignment" field is required',
        ],
        'contactcorvel' => [
            'required' => 'Check "Contact CorVel Enterprise Comp @ 877-764-3574" checkbox',
        ],
        'exposurehazmat' => [
            'required' => 'select a value from "Do you have any symptoms of illness or injury and require treatment?" dropdown',
        ],

        'fromdate' => [
            'required' => '"From Date Field is Required"',
            'date' => 'From Date is not a valid date',
        ],

        'todate' => [
            'required' => '"To Date Field is Required"',
            'date' => 'To Date is not a valid date',
            'after_or_equal' => 'To Date cannot be before From Date',
        ],
        'CorvelAttachmentName' => [
            'required' => 'Please upload "CorVel Work Ability Report Form"',
            'mimes' => 'Uploaded "CorVel Work Ability Report Form" can only be a PDF format',
        ],
        'InvestigationAttachment' => [
            'required' => 'Please upload "Investigation Report for Occupational Injury or Illness Form"',
            'mimes' => 'Uploaded "Investigation Report for Occupational Injury or Illness Form" can only be a PDF format',
        ],
        'StatementAttachment' => [
            'required' => 'Please upload "OFD 295a Injury Witness Statement Form"',
            'mimes' => 'Uploaded "OFD 295a Injury Witness Statement Form" can only be a PDF format',
        ],
        'EmployeeAttachment' => [
            'required' => 'Please upload "employee’s Choice of Physician or Doctor Form"',
            'mimes' => 'Uploaded "employee’s Choice of Physician or Doctor Form" can only be a PDF format',
        ],
        'Ofd25Attachment' => [
            'required' => 'Please upload " OFD25 Injury Intradepartmental Communication Form"',
            'mimes' => 'Uploaded " OFD25 Injury Intradepartmental Communication Form" can only be a PDF format',
        ],
        'LRS101' => [
            'required' => 'Please upload "LRS 101 City of Omaha Accident Report"',
            'mimes' => 'Uploaded "LRS 101 City of Omaha Accident Report" can only be a PDF format',
        ],
        'OFD295' => [
            'required' => 'Please upload "OFD 295 Vehicle Accident Witness Statement"',
            'mimes' => 'Uploaded "OFD 295 Vehicle Accident Witness Statement" can only be a PDF format',
        ],
        'OFD025a' => [
            'required' => 'Please upload "OFD 25a Accident Intradepartmental Communication"',
            'mimes' => 'Uploaded "OFD 25a Accident Intradepartmental Communication" can only be a PDF format',
        ],
        'OFD025b' => [
            'required' => 'Please upload "OFD 25b Accident Intradepartmental Communication"',
            'mimes' => 'Uploaded "OFD 25b Accident Intradepartmental Communication" can only be a PDF format',
        ],
        'OFD025c' => [
            'required' => 'Please upload "OFD 25b Accident Intradepartmental Communication"',
            'mimes' => 'Uploaded "OFD 25b Accident Intradepartmental Communication" can only be a PDF format',
        ],
        'OFD31' => [
            'required' => 'Please upload "OFD 31-OFD Lost, Damaged or Stolen Equipment Report"',
            'mimes' => 'Uploaded "OFD 31-OFD Lost, Damaged or Stolen Equipment Report" can only be a PDF format',
        ],
        'OFD127' => [
            'required' => 'Please upload "OFD 127 Request for Services Form"',
            'mimes' => 'Uploaded "OFD 127 Request for Services Form" can only be a PDF format',
        ],
        'DR41' => [
            'required' => 'Please upload "State of Nebraska "DR Form 41""',
            'mimes' => 'Uploaded "State of Nebraska "DR Form 41"" can only be a PDF format',
        ],
        'trueofd184' => [
            'required' => 'Please upload "OFD 184 Form"',
            'mimes' => 'Uploaded "OFD 184 Form" can only be a PDF format',
        ],
        'potofd184' => [
            'required' => 'Please upload "OFD 184 Form"',
            'mimes' => 'Uploaded "OFD 184 Form" can only be a PDF format',
        ],
        'OFD025' => [
            'required' => 'Please upload "OFD-025 Hazmat Exposure Report form"',
            'mimes' => 'Uploaded "OFD-025 Hazmat Exposure Report form" can only be a PDF format',
        ],
        'frmsincidentnum1' => [
            'required' => '"FRMS Incident#" field is required',
            'integer' => '"FRMS Incident#" field should be a integer',
        ],
        'incidentid' => [
            'required' => '"EPCR Incident#" field is required',
            'integer' => '"EPCR Incident#" field should be a integer',
        ],
        'incidenttype' => [
            'required' => '"Incident Type" field is required',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];