<?php
echo "
<div class='btn-group' id='btn-countries'>
 <button type='button' class='btn btn-default dropdown-toggle form-control' data-toggle='dropdown'>
   <span data-bind='label'>Select Countries</span>&nbsp;<span class='caret'></span>
 </button>
 <ul class='dropdown-menu' role='menu' id='countries'>
    <li value='AD'><a href='#'>Andorra</a></li>
	<li value='AE'><a href='#'>United Arab Emirates</a></li>
	<li value='AF'><a href='#'>Afghanistan</a></li>
	<li value='AG'><a href='#'>Antigua and Barbuda</a></li>
	<li value='AI'><a href='#'>Anguilla</a></li>
	<li value='AL'><a href='#'>Albania</a></li>
	<li value='AM'><a href='#'>Armenia</a></li>
	<li value='AO'><a href='#'>Angola</a></li>
	<li value='AQ'><a href='#'>Antarctica</a></li>
	<li value='AR'><a href='#'>Argentina</a></li>
	<li value='AS'><a href='#'>American Samoa</a></li>
	<li value='AT'><a href='#'>Austria</a></li>
	<li value='AU'><a href='#'>Australia</a></li>
	<li value='AW'><a href='#'>Aruba</a></li>
	<li value='AX'><a href='#'>Åland</a></li>
	<li value='AZ'><a href='#'>Azerbaijan</a></li>
	<li value='BA'><a href='#'>Bosnia and Herzegovina</a></li>
	<li value='BB'><a href='#'>Barbados</a></li>
	<li value='BD'><a href='#'>Bangladesh</a></li>
	<li value='BE'><a href='#'>Belgium</a></li>
	<li value='BF'><a href='#'>Burkina Faso</a></li>
	<li value='BG'><a href='#'>Bulgaria</a></li>
	<li value='BH'><a href='#'>Bahrain</a></li>
	<li value='BI'><a href='#'>Burundi</a></li>
	<li value='BJ'><a href='#'>Benin</a></li>
	<li value='BL'><a href='#'>Saint Barthélemy</a></li>
	<li value='BM'><a href='#'>Bermuda</a></li>
	<li value='BN'><a href='#'>Brunei</a></li>
	<li value='BO'><a href='#'>Bolivia</a></li>
	<li value='BQ'><a href='#'>Bonaire</a></li>
	<li value='BR'><a href='#'>Brazil</a></li>
	<li value='BS'><a href='#'>Bahamas</a></li>
	<li value='BT'><a href='#'>Bhutan</a></li>
	<li value='BV'><a href='#'>Bouvet Island</a></li>
	<li value='BW'><a href='#'>Botswana</a></li>
	<li value='BY'><a href='#'>Belarus</a></li>
	<li value='BZ'><a href='#'>Belize</a></li>
	<li value='CA'><a href='#'>Canada</a></li>
	<li value='CC'><a href='#'>Cocos [Keeling] Islands</a></li>
	<li value='CD'><a href='#'>Democratic Republic of the Congo</a></li>
	<li value='CF'><a href='#'>Central African Republic</a></li>
	<li value='CG'><a href='#'>Republic of the Congo</a></li>
	<li value='CH'><a href='#'>Switzerland</a></li>
	<li value='CI'><a href='#'>Ivory Coast</a></li>
	<li value='CK'><a href='#'>Cook Islands</a></li>
	<li value='CL'><a href='#'>Chile</a></li>
	<li value='CM'><a href='#'>Cameroon</a></li>
	<li value='CN'><a href='#'>China</a></li>
	<li value='CO'><a href='#'>Colombia</a></li>
	<li value='CR'><a href='#'>Costa Rica</a></li>
	<li value='CU'><a href='#'>Cuba</a></li>
	<li value='CV'><a href='#'>Cape Verde</a></li>
	<li value='CW'><a href='#'>Curacao</a></li>
	<li value='CX'><a href='#'>Christmas Island</a></li>
	<li value='CY'><a href='#'>Cyprus</a></li>
	<li value='CZ'><a href='#'>Czech Republic</a></li>
	<li value='DE'><a href='#'>Germany</a></li>
	<li value='DJ'><a href='#'>Djibouti</a></li>
	<li value='DK'><a href='#'>Denmark</a></li>
	<li value='DM'><a href='#'>Dominica</a></li>
	<li value='DO'><a href='#'>Dominican Republic</a></li>
	<li value='DZ'><a href='#'>Algeria</a></li>
	<li value='EC'><a href='#'>Ecuador</a></li>
	<li value='EE'><a href='#'>Estonia</a></li>
	<li value='EG'><a href='#'>Egypt</a></li>
	<li value='EH'><a href='#'>Western Sahara</a></li>
	<li value='ER'><a href='#'>Eritrea</a></li>
	<li value='ES'><a href='#'>Spain</a></li>
	<li value='ET'><a href='#'>Ethiopia</a></li>
	<li value='FI'><a href='#'>Finland</a></li>
	<li value='FJ'><a href='#'>Fiji</a></li>
	<li value='FK'><a href='#'>Falkland Islands</a></li>
	<li value='FM'><a href='#'>Micronesia</a></li>
	<li value='FO'><a href='#'>Faroe Islands</a></li>
	<li value='FR'><a href='#'>France</a></li>
	<li value='GA'><a href='#'>Gabon</a></li>
	<li value='GB'><a href='#'>United Kingdom</a></li>
	<li value='GD'><a href='#'>Grenada</a></li>
	<li value='GE'><a href='#'>Georgia</a></li>
	<li value='GF'><a href='#'>French Guiana</a></li>
	<li value='GG'><a href='#'>Guernsey</a></li>
	<li value='GH'><a href='#'>Ghana</a></li>
	<li value='GI'><a href='#'>Gibraltar</a></li>
	<li value='GL'><a href='#'>Greenland</a></li>
	<li value='GM'><a href='#'>Gambia</a></li>
	<li value='GN'><a href='#'>Guinea</a></li>
	<li value='GP'><a href='#'>Guadeloupe</a></li>
	<li value='GQ'><a href='#'>Equatorial Guinea</a></li>
	<li value='GR'><a href='#'>Greece</a></li>
	<li value='GS'><a href='#'>South Georgia and the South Sandwich Islands</a></li>
	<li value='GT'><a href='#'>Guatemala</a></li>
	<li value='GU'><a href='#'>Guam</a></li>
	<li value='GW'><a href='#'>Guinea-Bissau</a></li>
	<li value='GY'><a href='#'>Guyana</a></li>
	<li value='HK'><a href='#'>Hong Kong</a></li>
	<li value='HM'><a href='#'>Heard Island and McDonald Islands</a></li>
	<li value='HN'><a href='#'>Honduras</a></li>
	<li value='HR'><a href='#'>Croatia</a></li>
	<li value='HT'><a href='#'>Haiti</a></li>
	<li value='HU'><a href='#'>Hungary</a></li>
	<li value='ID'><a href='#'>Indonesia</a></li>
	<li value='IE'><a href='#'>Ireland</a></li>
	<li value='IL'><a href='#'>Israel</a></li>
	<li value='IM'><a href='#'>Isle of Man</a></li>
	<li value='IN'><a href='#'>India</a></li>
	<li value='IO'><a href='#'>British Indian Ocean Territory</a></li>
	<li value='IQ'><a href='#'>Iraq</a></li>
	<li value='IR'><a href='#'>Iran</a></li>
	<li value='IS'><a href='#'>Iceland</a></li>
	<li value='IT'><a href='#'>Italy</a></li>
	<li value='JE'><a href='#'>Jersey</a></li>
	<li value='JM'><a href='#'>Jamaica</a></li>
	<li value='JO'><a href='#'>Jordan</a></li>
	<li value='JP'><a href='#'>Japan</a></li>
	<li value='KE'><a href='#'>Kenya</a></li>
	<li value='KG'><a href='#'>Kyrgyzstan</a></li>
	<li value='KH'><a href='#'>Cambodia</a></li>
	<li value='KI'><a href='#'>Kiribati</a></li>
	<li value='KM'><a href='#'>Comoros</a></li>
	<li value='KN'><a href='#'>Saint Kitts and Nevis</a></li>
	<li value='KP'><a href='#'>North Korea</a></li>
	<li value='KR'><a href='#'>South Korea</a></li>
	<li value='KW'><a href='#'>Kuwait</a></li>
	<li value='KY'><a href='#'>Cayman Islands</a></li>
	<li value='KZ'><a href='#'>Kazakhstan</a></li>
	<li value='LA'><a href='#'>Laos</a></li>
	<li value='LB'><a href='#'>Lebanon</a></li>
	<li value='LC'><a href='#'>Saint Lucia</a></li>
	<li value='LI'><a href='#'>Liechtenstein</a></li>
	<li value='LK'><a href='#'>Sri Lanka</a></li>
	<li value='LR'><a href='#'>Liberia</a></li>
	<li value='LS'><a href='#'>Lesotho</a></li>
	<li value='LT'><a href='#'>Lithuania</a></li>
	<li value='LU'><a href='#'>Luxembourg</a></li>
	<li value='LV'><a href='#'>Latvia</a></li>
	<li value='LY'><a href='#'>Libya</a></li>
	<li value='MA'><a href='#'>Morocco</a></li>
	<li value='MC'><a href='#'>Monaco</a></li>
	<li value='MD'><a href='#'>Moldova</a></li>
	<li value='ME'><a href='#'>Montenegro</a></li>
	<li value='MF'><a href='#'>Saint Martin</a></li>
	<li value='MG'><a href='#'>Madagascar</a></li>
	<li value='MH'><a href='#'>Marshall Islands</a></li>
	<li value='MK'><a href='#'>Macedonia</a></li>
	<li value='ML'><a href='#'>Mali</a></li>
	<li value='MM'><a href='#'>Myanmar [Burma]</a></li>
	<li value='MN'><a href='#'>Mongolia</a></li>
	<li value='MO'><a href='#'>Macao</a></li>
	<li value='MP'><a href='#'>Northern Mariana Islands</a></li>
	<li value='MQ'><a href='#'>Martinique</a></li>
	<li value='MR'><a href='#'>Mauritania</a></li>
	<li value='MS'><a href='#'>Montserrat</a></li>
	<li value='MT'><a href='#'>Malta</a></li>
	<li value='MU'><a href='#'>Mauritius</a></li>
	<li value='MV'><a href='#'>Maldives</a></li>
	<li value='MW'><a href='#'>Malawi</a></li>
	<li value='MX'><a href='#'>Mexico</a></li>
	<li value='MY'><a href='#'>Malaysia</a></li>
	<li value='MZ'><a href='#'>Mozambique</a></li>
	<li value='NA'><a href='#'>Namibia</a></li>
	<li value='NC'><a href='#'>New Caledonia</a></li>
	<li value='NE'><a href='#'>Niger</a></li>
	<li value='NF'><a href='#'>Norfolk Island</a></li>
	<li value='NG'><a href='#'>Nigeria</a></li>
	<li value='NI'><a href='#'>Nicaragua</a></li>
	<li value='NL'><a href='#'>Netherlands</a></li>
	<li value='NO'><a href='#'>Norway</a></li>
	<li value='NP'><a href='#'>Nepal</a></li>
	<li value='NR'><a href='#'>Nauru</a></li>
	<li value='NU'><a href='#'>Niue</a></li>
	<li value='NZ'><a href='#'>New Zealand</a></li>
	<li value='OM'><a href='#'>Oman</a></li>
	<li value='PA'><a href='#'>Panama</a></li>
	<li value='PE'><a href='#'>Peru</a></li>
	<li value='PF'><a href='#'>French Polynesia</a></li>
	<li value='PG'><a href='#'>Papua New Guinea</a></li>
	<li value='PH'><a href='#'>Philippines</a></li>
	<li value='PK'><a href='#'>Pakistan</a></li>
	<li value='PL'><a href='#'>Poland</a></li>
	<li value='PM'><a href='#'>Saint Pierre and Miquelon</a></li>
	<li value='PN'><a href='#'>Pitcairn Islands</a></li>
	<li value='PR'><a href='#'>Puerto Rico</a></li>
	<li value='PS'><a href='#'>Palestine</a></li>
	<li value='PT'><a href='#'>Portugal</a></li>
	<li value='PW'><a href='#'>Palau</a></li>
	<li value='PY'><a href='#'>Paraguay</a></li>
	<li value='QA'><a href='#'>Qatar</a></li>
	<li value='RE'><a href='#'>Réunion</a></li>
	<li value='RO'><a href='#'>Romania</a></li>
	<li value='RS'><a href='#'>Serbia</a></li>
	<li value='RU'><a href='#'>Russia</a></li>
	<li value='RW'><a href='#'>Rwanda</a></li>
	<li value='SA'><a href='#'>Saudi Arabia</a></li>
	<li value='SB'><a href='#'>Solomon Islands</a></li>
	<li value='SC'><a href='#'>Seychelles</a></li>
	<li value='SD'><a href='#'>Sudan</a></li>
	<li value='SE'><a href='#'>Sweden</a></li>
	<li value='SG'><a href='#'>Singapore</a></li>
	<li value='SH'><a href='#'>Saint Helena</a></li>
	<li value='SI'><a href='#'>Slovenia</a></li>
	<li value='SJ'><a href='#'>Svalbard and Jan Mayen</a></li>
	<li value='SK'><a href='#'>Slovakia</a></li>
	<li value='SL'><a href='#'>Sierra Leone</a></li>
	<li value='SM'><a href='#'>San Marino</a></li>
	<li value='SN'><a href='#'>Senegal</a></li>
	<li value='SO'><a href='#'>Somalia</a></li>
	<li value='SR'><a href='#'>Suriname</a></li>
	<li value='SS'><a href='#'>South Sudan</a></li>
	<li value='ST'><a href='#'>São Tomé and Príncipe</a></li>
	<li value='SV'><a href='#'>El Salvador</a></li>
	<li value='SX'><a href='#'>Sint Maarten</a></li>
	<li value='SY'><a href='#'>Syria</a></li>
	<li value='SZ'><a href='#'>Swaziland</a></li>
	<li value='TC'><a href='#'>Turks and Caicos Islands</a></li>
	<li value='TD'><a href='#'>Chad</a></li>
	<li value='TF'><a href='#'>French Southern Territories</a></li>
	<li value='TG'><a href='#'>Togo</a></li>
	<li value='TH'><a href='#'>Thailand</a></li>
	<li value='TJ'><a href='#'>Tajikistan</a></li>
	<li value='TK'><a href='#'>Tokelau</a></li>
	<li value='TL'><a href='#'>East Timor</a></li>
	<li value='TM'><a href='#'>Turkmenistan</a></li>
	<li value='TN'><a href='#'>Tunisia</a></li>
	<li value='TO'><a href='#'>Tonga</a></li>
	<li value='TR'><a href='#'>Turkey</a></li>
	<li value='TT'><a href='#'>Trinidad and Tobago</a></li>
	<li value='TV'><a href='#'>Tuvalu</a></li>
	<li value='TW'><a href='#'>Taiwan</a></li>
	<li value='TZ'><a href='#'>Tanzania</a></li>
	<li value='UA'><a href='#'>Ukraine</a></li>
	<li value='UG'><a href='#'>Uganda</a></li>
	<li value='UM'><a href='#'>U.S. Minor Outlying Islands</a></li>
	<li value='US'><a href='#'>United States</a></li>
	<li value='UY'><a href='#'>Uruguay</a></li>
	<li value='UZ'><a href='#'>Uzbekistan</a></li>
	<li value='VA'><a href='#'>Vatican City</a></li>
	<li value='VC'><a href='#'>Saint Vincent and the Grenadines</a></li>
	<li value='VE'><a href='#'>Venezuela</a></li>
	<li value='VG'><a href='#'>British Virgin Islands</a></li>
	<li value='VI'><a href='#'>U.S. Virgin Islands</a></li>
	<li value='VN'><a href='#'>Vietnam</a></li>
	<li value='VU'><a href='#'>Vanuatu</a></li>
	<li value='WF'><a href='#'>Wallis and Futuna</a></li>
	<li value='WS'><a href='#'>Samoa</a></li>
	<li value='XK'><a href='#'>Kosovo</a></li>
	<li value='YE'><a href='#'>Yemen</a></li>
	<li value='YT'><a href='#'>Mayotte</a></li>
	<li value='ZA'><a href='#'>South Africa</a></li>
	<li value='ZM'><a href='#'>Zambia</a></li>
	<li value='ZW'><a href='#'>Zimbabwe</a></li>
 </ul>
</div>
";?>

