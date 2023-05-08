<?php

namespace Rawilk\HumanKeys\Commands;

use Illuminate\Console\Command;

class HumanKeysCommand extends Command
{
    public $signature = 'human-keys';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
