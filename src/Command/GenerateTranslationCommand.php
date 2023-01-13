<?php

namespace App\Command;

use App\Repository\TerritoryRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Stichoza\GoogleTranslate\GoogleTranslate;

class GenerateTranslationCommand extends Command
{
    private TerritoryRepository $territoryRepository;

    public function __construct(TerritoryRepository $territoryRepository,string $name = null)
    {
        $this->territoryRepository = $territoryRepository;
        parent::__construct($name);
    }

    protected static $defaultName = 'GenerateTranslation';
    protected static $defaultDescription = 'Generates translation file using Google Translate';

    protected function configure(): void
    {
        $this
            ->addArgument('from', InputArgument::REQUIRED, 'Translate from')
            ->addArgument('to', InputArgument::REQUIRED, 'Translate to')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Don\'nt save');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $from = $input->getArgument('from');
        $to = $input->getArgument('to');

        //remove current translations for destination language
        $dir = __DIR__."/../../translations/";
        $files = scandir($dir);
        foreach($files as $file) {
            if(str_contains($file, '.'.strtolower($to).'.')) {
                unlink($dir.$file);
                $io->writeln('Deleted file '.$file);
            }
            if(str_contains($file, '.'.strtolower($from).'.')) {
                $translationFileContent = file($dir.$file);
                dd($translationFileContent);
                // if not, get text after :
            }
        }



        dd('stop');


        /*
        $tr = new GoogleTranslate();
        $tr->setSource($from);
        $tr->setTarget($to);

        //supported languages: https://cloud.google.com/translate/docs/languages#try-it-for-yourself

        $countries = $this->territoryRepository->getNames();
        $translationFileContent = [];

        foreach ($countries as $country) {
            $translationFileContent[] = strtolower($country['slug']).": ".$tr->translate($country['name']);
        }


        $io->success('Wygenerowano tłumaczenie dla języka ' . $to . ' - sprawdź, czy wszystko ok.');
        */
        return Command::SUCCESS;
    }
}
