<?php

namespace App\Imports;

use App\User;
use App\Role;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Classes\GeneratePass;
use App\Mail\EmailVerification;
use URL;

class UsersImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        $gp = new GeneratePass;
        $role_user = Role::where('name', 'User')->first();

        foreach ($rows as $row) {
            
            $pass = $gp->randomPassword();
            $token = md5($gp->rememberToken());

            if(!empty($row[0])) {
                if(empty( User::where('email', $row[0])->first() )) {
                    $user = User::create([
                        'email' => $row[0],
                        'password' => Hash::make($pass),
                        'active_token' => $token
                    ]);

                    $url = url('/activate/'.$token);

                    $user->roles()->attach($role_user);
                    // $user->save();

                    $sender = 'kontakt@transmisja.konferencja-kki.pl';

                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    $headers .= 'From:' .  $sender . "\r\n";
                
                    $subject = 'Aktywuj konto';
                   
                    $message = '<html><body bgcolor="#ffffff">
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; color:#ffffff; width:100%;">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" style="width:100%;">
                                        <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#ffffff; width:650px;">
                                            <tr>
                                                <td align="left" valign="top">
                    
                                                    <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#ffffff; width:650px;">
                                                        <tr>
                                                            <td border="0" width="650" height="30" align="left" valign="middle" bgcolor="#093736" style="width:650px; height:30px; font-size:24px; line-height:26px; margin:0; padding:0; border:0; background-color:#ffffff">
                                                            </td>
                                                        </tr>
                    
                                                        <tr>
                                                            <td border="0" width="650" height="30" align="left" valign="middle" bgcolor="#093736" style="width:650px; height:30px; font-size:24px; line-height:26px; margin:0; padding:0; border:0; background-color:#ffffff">
                                                            </td>
                                                        </tr>
                    
                                                        <tr>
                                                            <td border="0" width="100"></td>
                                                            <td border="0" width="500" align="center" valign="middle" bgcolor="#093736" style="width:500px; font-size:24px; line-height:26px; margin:0; padding:0; border:0; background-color:#ffffff">
                                                                <p dir="LTR" style="margin:0; padding:0; font-size:28px; line-height:25pt; font-family: Arial, Helvetica, sans-serif; border-collapse:collapse; color:#000000; width: 500px;">
                                                                   <strong>Potwierdź swoje konto</strong>
                                                                </p>
                                                                <p dir="LTR" style="text-align: center; margin:0; padding:0; font-size:20px; line-height:26pt; font-family: Arial, Helvetica, sans-serif; border-collapse:collapse; color:#000000; width: 500px;">
                                                                    <br>
                                                                    <strong>Kliknij w link aby aktywować konto:</strong>
                                                                    <br><br>
                                                                 </p>
                                                                 <a target="_blank" href="'.$url.'" style="text-align: center; margin:0; padding: 15px 20px; font-size:20px; line-height:19pt; font-family: Arial, Helvetica, sans-serif; border-collapse:collapse; color: #ffffff; background: #008df1; text-decoration: none;">
                                                                     Aktywuj konto
                                                                 </a>
                                                            </td>
                                                            <td border="0" width="50"></td>
                                                        </tr>
                    
                                                        <tr>
                                                            <td border="0" width="650" height="30" align="left" valign="middle" bgcolor="#093736" style="width:650px; height:30px; font-size:24px; line-height:26px; margin:0; padding:0; border:0; background-color:#ffffff">
                                                            </td>
                                                        </tr>
                    
                                                        <tr>
                                                            <td border="0" width="100"></td>
                                                            <td border="0" width="500" align="center" valign="middle" bgcolor="#093736" style="width:500px; font-size:24px; line-height:26px; margin:0; padding:0; border:0; background-color:#ffffff">
                                                                <p dir="LTR" style="margin:0; padding:0; font-size:20px; line-height:19pt; font-family: Arial, Helvetica, sans-serif; border-collapse:collapse; color:#000000; width: 500px; text-align: center;">
                                                                    <br>
                                                                    <strong>Hasło do portalu: <br>
                                                                    '.$pass.'</strong>
                                                                 </p>
                                                            </td>
                                                            <td border="0" width="50"></td>
                                                        </tr>
                    
                                                        <tr>
                                                            <td border="0" width="650" height="30" align="left" valign="middle" bgcolor="#093736" style="width:650px; height:30px; font-size:24px; line-height:26px; margin:0; padding:0; border:0; background-color:#ffffff">
                                                            </td>
                                                        </tr>
                    
                                                    </table>
                                                </td>
                        </tr></table></td></tr></tbody></table></body></html>';

                    if (mail($row[0], $subject, $message, $headers))
                    {
                        $user->save();
                    }

                }
            }
        }
    }

}
