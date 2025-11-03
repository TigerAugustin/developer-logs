<?php

namespace ComCat\DeveloperLogs;



use Illuminate\Support\Facades\File;

class DeveloperLog {

protected $logPath;

public function __construct()
{


$this->logPath = storage_path('logs/developer');

}


public function DevLog(string $message, string $level = 'ERROR', array $context = [])
{

    if (!File::exists($this->logPath)) {
File::makeDirectory($this->logPath, 0777, true);

}



$filename = $this->logPath.'/developer-'. now()->format('Y-m-d').'.log';

$time = now()->format('Y-n-d H:i:s');

$file = $context['file'] ?? null;

$line = $context['line'] ?? null;

$function = $context['controller'] ?? null;

$entry = "==========================================================\n";
$entry .= "[$time] [$level]\n";
$entry .= "Error: $message\n";

if ($file && $line) {
$entry .= "Location: $file (Line $line)\n";
}

if ($function) {
$entry .= "Function: $function\n";
}

$entry .= "==========================================================\n\n";


File::append($filename, $entry);

}
}