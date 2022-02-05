<?php

namespace Database\Factories;

use App\Models\Instruction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InstructionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instruction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $instruction = '<p class="MsoNormal" style="text-align:justify"><span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Registration</span></b></span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Before you can start to make an application you must first of all register or create a user account for yourself.</span></span><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">
Upon completion, an email will be sent to you (email provided during 
registration) requiring you to activate your account together with your 
username and password.&nbsp; This will allow you to log into your account to 
manage your profile and track the progress of your application. To 
create your account please click on the Register button otherwise enter 
your username and password to log in to your account.</span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Please
note that every applicant must create their own personal account, 
including applicants who apply with the assistance of an agent.</span></span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Profile Management</span></b></span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">To
apply for a programme you will be required to complete your 
profile. These include your personal details, contact information, 
education background, work experience and Referees. You will also be 
required to upload scanned copies of your certificates, transcripts and 
passport photo. If you do not manage to complete your profile in one 
session your data will be saved and you can still come back and complete
it at a later time.</span></span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Programme Selection</span></b></span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Only
when your profile is complete can you apply for the programme you wish 
to undertake. You will select your programme from the intakes that are 
open at the time of making the application. You will also be able to 
view the entry requirements for the programme to see if you meet the 
requirements before making the application.</span></span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Payment of Application Fees</span></b></span></p><p class="MsoNormal" style="text-align:justify">You can pay your application fee as we will direct you then send as the scanned slip<span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><br></span></b></span>
        </p><p class="MsoNormal" style="text-align:justify"><span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Application Tracking</span></b></span><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"></span></b></p>

        <p class="MsoNormal" style="text-align:justify"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">You will be able to track the status of your application online through the system.</span>
        </p>

        <p class="MsoNormal" style="text-align:justify"><span class="infotext"><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Admission/Registration Process</span></b></span><b style="mso-bidi-font-weight:normal"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"></span></b></p>

The Online application system provides a mechanism for applicants to 
track the progress of the admission process at any given time. Upon the 
conclusion of the admission process, the applicant can download the 
admission letter and the joining instructions after we review your submitted documents<br>';
        return [
            'instruction'=>$instruction
        ];
    }
}
