<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact_us');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        // 1. Save to Database
        ContactMessage::create($validated);

        // 2. Save to File
        $logEntry = "==================================================" . PHP_EOL;
        $logEntry .= "[DATE & TIME]: " . now()->toDateTimeString() . PHP_EOL;
        $logEntry .= "[NAME]: " . $validated['name'] . PHP_EOL;
        $logEntry .= "[EMAIL]: " . $validated['email'] . PHP_EOL;
        $logEntry .= "[SUBJECT]: " . $validated['subject'] . PHP_EOL;
        $logEntry .= "[MESSAGE]:" . PHP_EOL . $validated['message'] . PHP_EOL;
        $logEntry .= "==================================================" . PHP_EOL . PHP_EOL;

        $directory = storage_path('app');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filePath = storage_path('app/contact_messages.txt');
        File::append($filePath, $logEntry);

        return back()->with('success', 'شكراً لتواصلك معنا! تم إرسال رسالتك وحفظها بنجاح.');
    }
}
