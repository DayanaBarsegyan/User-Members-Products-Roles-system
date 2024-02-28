<?php

namespace App\Console\Commands;

use App\Repositories\tokens\Write\TokensWriteRepositoryInterface;
use Illuminate\Console\Command;

class DeleteAllOldTokens extends Command
{
    public function __construct(
      private TokensWriteRepositoryInterface $tokensWriteRepository
    ){
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete tokens that have been created more than 15 minutes ago';

    /**
     * Execute the console command.
     */
    public function handle():void
    {
        $this->tokensWriteRepository->deleteOldTokens();
        $this->info('Old tokens deleted successfully.');
    }
}
