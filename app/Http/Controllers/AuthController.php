<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    function index(){
        return view('halaman_auth/login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && $user->email_verified_at === null) {
            return redirect()->route('auth')->withErrors('Akun anda belum aktif, harap verifikasi terlebih dahulu');
        }

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin')->with('success', 'Halo admin, anda berhasil login');
            } else if (Auth::user()->role === 'user') {
                return redirect()->route('user')->with('success', 'Anda berhasil login');
            }
        } else {
            return redirect()->route('auth')->withErrors('Email atau Password salah');
        }
    }

    function create(){
        return view('halaman_auth/register');
    }

    function register(Request $request){
        $str =  Str::random(100);

        $request->validate([
            'fullname' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'gambar' => 'required|image|file',
        ],[
            'fullname.required' => 'Full Name wajib diisi',
            'fullname.min' => 'Full Name minimal 5 karakter',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'gambar.required' => 'Gambar wajib di upload',
            'gambar.image' => 'Gambar yang di upload harus image',
            'gambar.file' => 'Gambar harus berupa file',
        ]);
        
        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('picture/accounts'),$nama_gambar);

        $inforegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gambar' => $nama_gambar,
            'verify_key' => $str,
        ];
    
        User::create($inforegister);

        $details = [
            'nama' => $inforegister['fullname'],
            'role' => 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'web' => 'PG CANDI BARU',
            'url' => 'http://'. request()->getHttpHost() . "/" . "verify/".$inforegister['verify_key'], 
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));
        
        return redirect()->route('auth')->with('success', 'Link verifikasi telah dikirim ke email anda, cek email anda untuk melakukan verifikasi');
    }

    function verify($verify_key){
        $key_check = User::select('verify_key')
        ->where('verify_key', $verify_key)
        ->exists();

        if($key_check){
            $user = User::where('verify_key', $verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect()->route('auth')->with('success','verifikasi berhasil. akun anda telah aktif'); 
        }else {
            return redirect()->route('auth')->whithErrors('key tidak valid. pastikan telah melakukan register')->whiteInput();
        }
    }
}
