<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AddressingDownloaderCommand extends Command
{

    protected static $defaultName = 'AddressingDownloader';
    protected static $defaultDescription = 'Download pdfs from UPU website';

    protected function configure(): void
    {
        $this
            ->addOption('force', null, InputOption::VALUE_NONE, 'Redownload all pdfs')
        ;
    }

    private function http_response($url, $status = null, $wait = 3): bool
    {
        $time = microtime(true);
        $expire = $time + $wait;

            // we are the parent
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $head = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if(!$head)
            {
                return FALSE;
            }

            if($status === null)
            {
                if($httpCode < 400)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            elseif($status == $httpCode)
            {
                return TRUE;
            }

            return FALSE;
            //pcntl_wait($status); //Protect against Zombie children

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);


        if ($input->getOption('force')) {
            // ...
        }

        $pdfsDirectory = __DIR__."/../../public/upupdf/";
        $url[0] = "https://www.upu.int/UPU/media/upu/PostalEntitiesFiles/addressingUnit/";
        $url[1] = "En.pdf";
        $codes = ['afg', 'ala', 'alb', 'dza', 'and', 'ago', 'atg', 'arg', 'arm', 'abw', 'aus', 'aut', 'aze', 'bhs',
            'bhr', 'bgd', 'brb', 'blr', 'bel', 'blz', 'ben', 'btn', 'bol', 'bih', 'bwa', 'bra', 'atb', 'iot', 'vgb',
            'brn', 'bgr', 'bfa', 'bdi', 'khm', 'cmr', 'can', 'cpv', 'cym', 'caf', 'tcd', 'chl', 'chn', 'cxr', 'cpt',
            'cck', 'col', 'com', 'cog', 'cok', 'cri', 'civ', 'hrv', 'cub', 'cuw', 'cyp', 'cze', 'prk', 'cod', 'dnk',
            'dji', 'dma', 'dom', 'ecu', 'egy', 'slv', 'gnq', 'eri', 'est', 'swz', 'eth', 'flk', 'fji', 'fin', 'fra',
            'guf', 'pyf', 'atf', 'gab', 'gmb', 'geo', 'deu', 'gha', 'gib', 'grc', 'grd', 'glp', 'gtm', 'gin', 'gnb',
            'guy', 'hti', 'hnd', 'hkg', 'hun', 'isl', 'ind', 'idn', 'irn', 'irq', 'irl', 'isr', 'ita', 'jam', 'jpn',
            'jor', 'kaz', 'ken', 'kir', 'kor', 'kwt', 'kgz', 'lao', 'lva', 'lbn', 'lso', 'lbr', 'lie', 'ltu', 'lux',
            'mac', 'mdg', 'mwi', 'mys', 'mdv', 'mli', 'mlt', 'mhl', 'mtq', 'mrt', 'mus', 'mex', 'fsm', 'mda', 'mco',
            'mng', 'mne', 'msr', 'mar', 'moz', 'mmr', 'nam', 'nru', 'npl', 'nld', 'ncl', 'nzl', 'nic', 'ner', 'nga',
            'nfk', 'mkd', 'nor', 'omn', 'pak', 'plw', 'pse', 'pan', 'png', 'pry', 'per', 'phl', 'pcn', 'pol', 'prt',
            'qat', 'reu', 'rou', 'rus', 'rwa', 'blm', 'kna', 'lca', 'maf', 'vct', 'wsm', 'smr', 'stp', 'sau', 'sen',
            'srb', 'syc', 'sle', 'sgp', 'svk', 'svn', 'slb', 'som', 'zaf', 'sgs', 'ssd', 'esp', 'lka', 'shn', 'lby',
            'sdn', 'sur', 'sjm', 'swe', 'che', 'syr', 'tjk', 'tza', 'myt', 'spm', 'tha', 'tls', 'tgo', 'ton', 'tto',
            'taa', 'tun', 'tur', 'tkm', 'tca', 'tuv', 'uga', 'ukr', 'are', 'gbr', 'usa', 'ury', 'uzb', 'vut', 'vat',
            'ven', 'vnm', 'wlf', 'yem', 'zmb', 'zwe'];
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_FAILONERROR,true);
        foreach($codes as $code) {
            $pdfurl = $url[0].$code.$url[1];
            if($this->http_response($pdfurl)) {
                curl_setopt($ch,CURLOPT_URL,$pdfurl);
                curl_exec($ch);
            }
        }
        curl_close($ch);
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
