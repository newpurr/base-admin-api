<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

/**
 * Class Index
 *
 * @copyright this Command Learn from the implementation of < https://github.com/z-song/laravel-admin/blob/master/src/Console/AdminCommand.php >
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Console\Commands
 */
class Index extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'base-admin';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '列出所有base-admin提供的命令';
    
    /**
     * @var string
     */
    public static $logo = <<<LOGO
_                                _           _                     _
| |__   __ _ ___  ___    __ _  __| |_ __ ___ (_)_ __     __ _ _ __ (_)
| '_ \ / _` / __|/ _ \  / _` |/ _` | '_ ` _ \| | '_ \   / _` | '_ \| |
| |_) | (_| \__ \  __/ | (_| | (_| | | | | | | | | | | | (_| | |_) | |
|_.__/ \__,_|___/\___|  \__,_|\__,_|_| |_| |_|_|_| |_|  \__,_| .__/|_|
                                                             |_|
                                                             
                                                            copyrgiht © SuperHappysir
LOGO;
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info(static::$logo);
        $this->comment('');
        $this->comment('可用的命令:');
        $this->comment('');
        $this->getCommands();
        $this->comment('');
    }
    /**
     * get all admin commands.
     *
     * @return void
     */
    protected function getCommands()
    {
        $commands = collect(Artisan::all())->mapWithKeys(function ($command, $key) {
            if (Str::startsWith($key, 'base-admin:')) {
                return [$key => $command];
            }
            return [];
        })->toArray();
        $width = $this->getColumnWidth($commands);
        /** @var Command $command */
        foreach ($commands as $command) {
            $this->info(sprintf(" %-{$width}s %s", $command->getName(), $command->getDescription()));
        }
    }
    
    /**
     * @param array $commands
     *
     * @return int
     */
    private function getColumnWidth(array $commands) : int
    {
        $widths = [];
        foreach ($commands as $command) {
            $widths[] = static::strlen($command->getName());
            foreach ($command->getAliases() as $alias) {
                $widths[] = static::strlen($alias);
            }
        }
        return $widths ? max($widths) + 2 : 0;
    }
    /**
     * Returns the length of a string, using mb_strwidth if it is available.
     *
     * @param string $string The string to check its length
     *
     * @return int The length of the string
     */
    public static function strlen($string) : int
    {
        if (false === $encoding = mb_detect_encoding($string, null, true)) {
            return strlen($string);
        }
        return mb_strwidth($string, $encoding);
    }
}
