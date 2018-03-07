<?php

namespace Bantenprov\DPPBankDunia\Console\Commands;

use Illuminate\Console\Command;

/**
 * The DPPBankDuniaCommand class.
 *
 * @package Bantenprov\DPPBankDunia
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DPPBankDuniaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:dpp-bank-dunia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\DPPBankDunia package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\DPPBankDunia package');
    }
}
