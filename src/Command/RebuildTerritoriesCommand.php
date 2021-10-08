<?php

namespace App\Command;

use App\Entity\Territory;
use App\Repository\TerritoryRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RebuildTerritoriesCommand extends Command
{
    private const LEFT_ALIGNED_TO_LEFT = 'ldl';
    private const LEFT_CENTERED = 'lds';
    private const LEFT_ALIGNED_TO_RIGHT = 'ldp';
    private const CENTER_ALIGNED_TO_LEFT = 'sdl';
    private const CENTER_CENTERED = 'sds';
    private const CENTER_ALIGNED_TO_RIGHT = 'sdp';
    private const RIGHT_ALIGNED_TO_LEFT = 'pdl';
    private const RIGHT_CENTERED = 'pds';
    private const RIGHT_ALIGNED_TO_RIGHT = 'pdp';

    protected static $defaultName = 'RebuildTerritories';
    protected static $defaultDescription = 'Add a short description for your command';

    private TerritoryRepository $territoryRepository;

    public function __construct(TerritoryRepository $territoryRepository, string $name = null)
    {
        parent::__construct($name);
        $this->territoryRepository = $territoryRepository;
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
        ;
    }

    private function isoToEmoji(?string $iso): string
    {
        if (is_null($iso) || strlen($iso) !== 2) {
            return "";
        } else {
            $isoLetters = str_split(strtoupper($iso));
            $emoji = "";
            $emoji .= mb_convert_encoding('&#' . ( 127397 + ord($isoLetters[0]) ) . ';', 'UTF-8', 'HTML-ENTITIES');
            $emoji .= mb_convert_encoding('&#' . ( 127397 + ord($isoLetters[1]) ) . ';', 'UTF-8', 'HTML-ENTITIES');
            return $emoji;
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $territories = [];

        $territories[] = new Territory('Abkhazia', 'Abkhazie', 'Аҧсны', 'Republic of Abkhazia', 'République d\'Abkhazie', 'Аҧсны Аҳәынҭқарра', 0, 1, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'XX-AB', null);
        $territories[] = new Territory('Afghanistan', 'Afghanistan', 'افغانستان', 'Islamic Republic of Afghanistan', 'République islamique d\'Afghanistan', 'د افغانستان اسلامي جمهوریت', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'afg', 'AF', null);
        $territories[] = new Territory('Åland Islands', 'Åland', 'Åland Ahvenanmaa', 'Åland Islands', 'Åland', 'Åland Ahvenanmaa', 1, 0, '', '/(AX-\\d{5})|(\\d{5})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ala', 'AX', null);
        $territories[] = new Territory('Albania', 'Albanie', 'Shqipëria', 'Republic of Albania', 'République d’Albanie', 'Republika e Shqipërisë', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'alb', 'AL', null);
        $territories[] = new Territory('Algeria', 'Algérie', 'الجزائر', 'People\'s Democratic Republic of Algeria', 'République algérienne démocratique et populaire', 'الجمهورية الجزائرية الديمقراطية الشعبية', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'dza', 'DZ', null);
        $territories[] = new Territory('American Samoa', 'Samoa américaines', 'American Samoa', 'American Samoa', 'Samoa américaines', 'American Samoa', 1, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'asm', 'AS', null);
        $territories[] = new Territory('Andorra', 'Andorre', 'Andorra', 'Principality of Andorra', 'Principauté d\'Andorre', 'Principat d\'Andorra', 0, 0, '', '/(AD)([0-9]{3})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'and', 'AD', null);
        $territories[] = new Territory('Angola', 'Angola', 'Angola', 'Republic of Angola', 'République d\'Angola', 'República de Angola', 0, 0, '', '/($^)/', '', self::CENTER_CENTERED, 'ago', 'AO', null);
        $territories[] = new Territory('Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 1, 0, '', '/AI-2640/', '', self::RIGHT_ALIGNED_TO_LEFT, 'aia', 'AI', null);
        $territories[] = new Territory('Antigua and Barbuda', 'Antigua-et-Barbuda', 'Antigua and Barbuda', 'Antigua and Barbuda', 'Antigua-et-Barbuda', 'Antigua and Barbuda', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'atg', 'AG', null);
        $territories[] = new Territory('Argentina', 'Argentine', 'Argentina', 'Argentine Republic', 'République argentine', 'República Argentina', 0, 0, '', '/[A-Z]\\d{4}[A-Z]{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'are', 'AR', null);
        $territories[] = new Territory('Armenia', 'Arménie', 'Հայաստան', 'Republic of Armenia', 'République d\'Arménie', 'Հայաստանի Հանրապետություն', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'arm', 'AM', null);
        $territories[] = new Territory('Artsakh', 'Artsakh', 'Արցախ', 'Republic of Artsakh', 'République d\'Artsakh', 'Արցախի Հանրապետություն', 0, 1, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'XX-AR', null);
        $territories[] = new Territory('Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'abw', 'AW', null);
        $territories[] = new Territory('Ascension', 'Ascension', 'Ascension', 'Ascension', 'Ascension', 'Ascension', 1, 0, '', '/(ASCN 1ZZ)/', '', self::CENTER_ALIGNED_TO_LEFT, 'asc', 'SH', null);
        $territories[] = new Territory('Australia', 'Australie', 'Australia', 'Commonwealth of Australia', 'Commonwealth d\'Australie', 'Commonwealth of Australia', 0, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'aus', 'AU', null);
        $territories[] = new Territory('Austria', 'Autriche', 'Österreich', 'Republic of Austria', 'République d’Autriche', 'Republik Österreich', 0, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'aut', 'AT', null);
        $territories[] = new Territory('Azerbaijan', 'Azerbaïdjan', 'Azərbaycan', 'Republic of Azerbaijan', 'République d\'Azerbaïdjan', 'Azərbaycan Respublikası', 0, 0, '', '/(AZ)(\\s{1})(\\d{4})/', '', self::RIGHT_ALIGNED_TO_RIGHT, 'aze', 'AZ', null);
        $territories[] = new Territory('Bahamas', 'Bahamas', 'The Bahamas', 'Commonwealth of The Bahamas', 'Commonwealth des Bahamas', 'Commonwealth of The Bahamas', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'bhs', 'BS', null);
        $territories[] = new Territory('Bahrain', 'Bahreïn', 'البحرين', 'Kingdom of Bahrain', 'Royaume de Bahreïn', 'مملكة البحرين', 0, 0, '', '/(\\d{3,4})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bhr', 'BH', null);
        $territories[] = new Territory('Bangladesh', 'Bangladesh', 'বাংলাদেশ', 'People\'s Republic of Bangladesh', 'République populaire du Bangladesh', 'গণপ্রজাতন্ত্রী বাংলাদেশ', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_RIGHT, 'bgd', 'BD', null);
        $territories[] = new Territory('Barbados', 'Barbade', 'Barbados', 'Barbados', 'Barbade', 'Barbados', 0, 0, '', '/(BB)(\\d{5})/', '', self::CENTER_ALIGNED_TO_LEFT, 'brb', 'BB', null);
        $territories[] = new Territory('Belarus', 'Biélorussie', 'Беларусь', 'Republic of Belarus', 'République de Bélarus', 'Рэспубліка Беларусь', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'blr', 'BY', null);
        $territories[] = new Territory('Belgium', 'Belgique', 'België / Belgique', 'Kingdom of Belgium', 'Royaume de Belgique', 'Koninkrijk België / Royaume de Belgique', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bel', 'BE', null);
        $territories[] = new Territory('Belize', 'Belize', 'Belize', 'Belize', 'Belize', 'Belize', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'blz', 'BZ', null);
        $territories[] = new Territory('Benin', 'Bénin', 'Bénin', 'Republic of Benin', 'République du Bénin', 'République du Bénin', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ben', 'BJ', null);
        $territories[] = new Territory('Bermuda', 'Bermudes', 'Bermuda', 'Bermuda', 'Bermuda', 'Bermuda', 1, 0, '', '/([A-Z]{2}\\s\\d{2})|([A-Z]{2}\\s[A-Z]{2})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bmu', 'BM', null);
        $territories[] = new Territory('Bhutan', 'Bhoutan', 'Bhutan', 'Kingdom of Bhutan', 'Royaume du Bhoutan', 'འབྲུག་རྒྱལ་ཁབ་', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'btn', 'BT', null);
        $territories[] = new Territory('Bolivia', 'Bolivie', 'Bolivia', 'Plurinational State of Bolivia', 'Estado Plurinacional de Bolivia', 'Estado Plurinacional de Bolivia', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'bol', 'BO', null);
        $territories[] = new Territory('Bonaire', 'Bonaire', 'Bonaire', 'Bonaire', 'Bonaire', 'Bonaire', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bes', 'BQ', null);
        $territories[] = new Territory('Bosnia and Herzegovina', 'Bosnie-Herzégovine', 'Bosna i Hercegovina', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine', 'Bosna i Hercegovina', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bih', 'BA', null);
        $territories[] = new Territory('Botswana', 'Botswana', 'Botswana', 'Republic of Botswana', 'République du Botswana', 'Lefatshe la Botswana', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'bwa', 'BW', null);
        $territories[] = new Territory('Bouvet Island', 'île Bouvet', 'Bouvetøya', 'Bouvet Island', 'île Bouvet', 'Bouvetøya', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bvt', 'BV', null);
        $territories[] = new Territory('Brazil', 'Brésil', 'Brasil', 'Federative Republic of Brazil', 'République fédérative du Brésil', 'República Federativa do Brasil', 0, 0, '', '/(\\d{5})-(\\d{3})/', '', self::LEFT_ALIGNED_TO_LEFT, 'bra', 'BR', null);
        $territories[] = new Territory('British Antarctic Territory', 'Territoire antarctique britannique', 'British Antarctic Territory', 'British Antarctic Territory', 'Territoire antarctique britannique', 'British Antarctic Territory', 1, 0, '', '/(BIQQ 1ZZ)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'xba', 'XX-AT', null);
        $territories[] = new Territory('British Indian Ocean Territory', 'Territoire britannique de l\'océan Indien', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'Territoire britannique de l\'océan Indien', 'British Indian Ocean Territory', 1, 0, '', '/(BBND 1ZZ)/', '', self::LEFT_ALIGNED_TO_LEFT, 'iot', 'IO', null);
        $territories[] = new Territory('British Virgin Islands', 'Îles Vierges britanniques', 'British Virgin Islands', 'British Virgin Islands', 'Îles Vierges britanniques', 'British Virgin Islands', 1, 0, '', '/(VG)(\\d{4})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'vgb', 'VG', null);
        $territories[] = new Territory('Brunei', 'Brunei', 'بروني', 'Sultanate of Brunei', 'Sultanat de Brunei', 'Negara Brunei Darussalam', 0, 0, '', '/([A-Z]{2})([\\d{4})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'brn', 'BN', null);
        $territories[] = new Territory('Bulgaria', 'Bulgarie', 'България', 'Republic of Bulgaria', 'République de Bulgarie', 'Република България', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bgr', 'BG', null);
        $territories[] = new Territory('Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bfa', 'BF', null);
        $territories[] = new Territory('Burundi', 'Burundi', 'Burundi', 'Republic of Burundi', 'République du Burundi', 'République du Burundi', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bdi', 'BI', null);
        $territories[] = new Territory('Cambodia', 'Cambodge', 'កម្ពុជា', 'Kingdom of Cambodia', 'Royaume du Cambodge', 'ព្រះរាជាណាចក្រកម្ពុជា', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'khm', 'KH', null);
        $territories[] = new Territory('Cameroon', 'Cameroun', 'Cameroun', 'Republic of Cameroon', 'République du Cameroun', 'République du Cameroun', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cmr', 'CM', null);
        $territories[] = new Territory('Canada', 'Canada', 'Canada', 'Canada', 'Canada', 'Canada', 0, 0, '', '/[ABCEGHJ-NPRSTVXY]{1}\\d{1}[A-Z]{1}\\s?\\d{1}[A-Z]{1}\\d{1}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'can', 'CA', null);
        $territories[] = new Territory('Cape Verde', 'Cap-Vert', 'Cabo Verde', 'Republic of Cabo Verde', 'République du Cap-Vert', 'República de Cabo Verde', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cpv', 'CV', null);
        $territories[] = new Territory('Cayman Islands', 'Îles Caïmans', 'Cayman Islands', 'Cayman Islands', 'Îles Caïmans', 'Cayman Islands', 1, 0, '', '/(KY)\\d-\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cym', 'KY', null);
        $territories[] = new Territory('Central African Republic', 'République centrafricaine', 'République Centrafricaine', 'Central African Republic', 'République centrafricaine', 'République centrafricaine', 0, 0, '', '/($^)/', '', self::CENTER_CENTERED, 'caf', 'CF', null);
        $territories[] = new Territory('Chad', 'Tchad', 'Tchad', 'Republic of Chad', 'République du Tchad', 'République du Tchad', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tcd', 'TD', null);
        $territories[] = new Territory('Chile', 'Chili', 'Chile', 'Republic of Chile', 'République du Chili', 'República de Chile', 0, 0, '', '/(\\d{3}-\\d{4})|(\\d{7})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'chl', 'CL', null);
        $territories[] = new Territory('China', 'Chine', '中国', 'People\'s Republic of China', 'République populaire de Chine', '中华人民共和国', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'chn', 'CN', null);
        $territories[] = new Territory('Christmas Island', 'Île Christmas', 'Christmas Island', 'Christmas Island', 'Île Christmas', 'Christmas Island', 1, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'cxr', 'CX', null);
        $territories[] = new Territory('Clipperton Island', 'Île Clipperton', 'Île Clipperton', 'Clipperton Island', 'Île Clipperton', 'Île Clipperton', 1, 0, '', '/(98799)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cpt', 'XX-CL', null);
        $territories[] = new Territory('Cocos (Keeling) Islands', 'îles Cocos', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'îles Cocos', 'Cocos (Keeling) Islands', 1, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'cck', 'CC', null);
        $territories[] = new Territory('Colombia', 'Colombie', 'Colombia', 'Republic of Colombia', 'République de Colombie', 'República de Colombia', 0, 0, '', '/\\d{6}/', '', self::CENTER_CENTERED, 'col', 'CO', null);
        $territories[] = new Territory('Comoros', 'Comores', 'جزر القمر', 'Union of the Comoros', 'Union des Comores', 'الاتحاد القمري', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'com', 'KM', null);
        $territories[] = new Territory('Congo, Democratic Republic of the', 'République démocratique du Congo', 'République démocratique du Congo', 'Democratic Republic of Congo', 'République démocratique du Congo', 'République démocratique du Congo', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cod', 'CD', null);
        $territories[] = new Territory('Congo, Republic of the', 'République du Congo', 'République du Congo', 'Republic of the Congo', 'République du Congo', 'République du Congo', 0, 0, '', '/($^)/', '', self::CENTER_CENTERED, 'cog', 'CG', null);
        $territories[] = new Territory('Cook Islands', 'Îles Cook', 'Cook Islands', 'Cook Islands', 'Îles Cook', 'Cook Islands', 1, 0, '', '/($^)/', '', self::LEFT_ALIGNED_TO_LEFT, 'cok', 'CK', null);
        $territories[] = new Territory('Costa Rica', 'Costa Rica', 'Costa Rica', 'Republic of Costa Rica', 'République du Costa Rica', 'República de Costa Rica', 0, 0, '', '/\\d{5}-\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'cri', 'CR', null);
        $territories[] = new Territory('Côte d\'Ivoire (Ivory Coast)', 'Côte d\'Ivoire', 'Côte d\'Ivoire', 'Republic of Côte d\'Ivoire', 'République de Côte d\'Ivoire', 'République de Côte d\'Ivoire', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'civ', 'CI', null);
        $territories[] = new Territory('Croatia', 'Croatie', 'Hrvatska', 'Republic of Croatia', 'République de Croatie', 'Republika Hrvatska', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'hrv', 'HR', null);
        $territories[] = new Territory('Cuba', 'Cuba', 'Cuba', 'Republic of Cuba', 'République de Cuba', 'República de Cuba', 0, 0, '', '/(CP)\\d{5)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cub', 'CU', null);
        $territories[] = new Territory('Curaçao', 'Curaçao', 'Curaçao', 'Curaçao', 'Curaçao', 'Curaçao', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cuw', 'CW', null);
        $territories[] = new Territory('Cyprus', 'Chypre', 'Κύπρος', 'Republic of Cyprus', 'République de Chypre', 'Κυπριακή Δημοκρατία', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cyp', 'CY', null);
        $territories[] = new Territory('Czech Republic', 'République tchèque', 'Česká republika', 'Czech Republic', 'République tchèque', 'Česká republika', 0, 0, '', '/\\d{3}\\s\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'cze', 'CZ', null);
        $territories[] = new Territory('Denmark', 'Danemark', 'Danmark', 'Kingdom of Denmark', 'Royaume de Danemark', 'Kongeriget Danmark', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'dnk', 'DK', null);
        $territories[] = new Territory('Djibouti', 'Djibouti', 'جيبوتي', 'Republic of Djibouti', 'République de Djibouti', 'République de Djibouti', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'dji', 'DJ', null);
        $territories[] = new Territory('Dominica', 'Dominique', 'Dominica', 'Commonwealth of Dominica', 'Dominique', 'Commonwealth of Dominica', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'dma', 'DM', null);
        $territories[] = new Territory('Dominican Republic', 'République dominicaine', 'República Dominicana', 'Dominican Republic', 'République dominicaine', 'República Dominicana', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'dom', 'DO', null);
        $territories[] = new Territory('East Timor', 'Timor oriental', 'Timor-Leste', 'Democratic Republic of Timor-Leste', 'République démocratique du Timor oriental', 'República Democrática de Timor-Leste', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tls', 'TL', null);
        $territories[] = new Territory('Ecuador', 'Équateur', 'Ecuador', 'Republic of Ecuador', 'République de l\'Équateur', 'República del Ecuador', 0, 0, '', '/\\d{6}/', '', self::LEFT_ALIGNED_TO_LEFT, 'ecu', 'EC', null);
        $territories[] = new Territory('Egypt', 'Égypte', 'مصر', 'Arab Republic of Egypt', 'République arabe d\'Égypte', 'جمهورية مصر العربية', 0, 0, '', '/\\d{5}/', '', self::CENTER_CENTERED, 'egy', 'EG', null);
        $territories[] = new Territory('El Salvador', 'Salvador', 'El Salvador', 'Republic of El Salvador', 'République du Salvador', 'República de El Salvador', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_RIGHT, 'slv', 'SV', null);
        $territories[] = new Territory('Equatorial Guinea', 'Guinée équatoriale', 'Guinea Ecuatorial', 'Republic of Equatorial Guinea', 'Guinée équatoriale', 'República de Guinea Ecuatorial', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gnq', 'GQ', null);
        $territories[] = new Territory('Eritrea', 'Érythrée', 'إرتريا / ኤርትራ', 'State of Eritrea', 'État d\'Érythrée', 'ሃገረ ኤርትራ', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'eri', 'ER', null);
        $territories[] = new Territory('Estonia', 'Estonie', 'Eesti', 'Republic of Estonia', 'République d\'Estonie', 'Eesti Vabariik', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'est', 'EE', null);
        $territories[] = new Territory('Ethiopia', 'Éthiopie', 'ኢትዮጵያ', 'Federal Democratic Republic of Ethiopia', 'République démocratique fédérale d’Éthiopie', 'የኢትዮጵያ ፌዴራላዊ ዴሞክራሲያዊ ሪፐብሊክ', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'eth', 'ET', null);
        $territories[] = new Territory('Falkland Islands (Malvinas)', 'Malouines', 'Falkland Islands (Malvinas)', 'Falkland Islands (Malvinas)', 'Malouines', 'Falkland Islands (Malvinas)', 1, 0, '', '/(FIQQ 1ZZ)/', '', self::LEFT_ALIGNED_TO_LEFT, 'flk', 'FK', null);
        $territories[] = new Territory('Faroe Islands', 'Îles Féroé', 'Føroyar', 'Faroe Islands', 'Îles Féroé', 'Føroyar', 1, 0, '', '/\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'fro', 'FO', null);
        $territories[] = new Territory('Fiji', 'Fidji', 'Fiji', 'Republic of Fiji', 'République des Fidji', 'Republic of Fiji', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'fji', 'FJ', null);
        $territories[] = new Territory('Finland', 'Finlande', 'Suomi', 'Republic of Finland', 'République de Finlande', 'Suomen tasavalta', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'fin', 'FI', null);
        $territories[] = new Territory('France', 'France', 'France', 'French Republic', 'République française', 'République française', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'fra', 'FR', null);
        $territories[] = new Territory('French Guiana', 'Guyane française', 'Guyane française', 'French Guiana', 'Guyane française', 'Guyane française', 1, 0, '', '/(973)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'guf', 'GF', null);
        $territories[] = new Territory('French Polynesia', 'Polynésie française', 'Polynésie française', 'French Polynesia', 'Polynésie française', 'Polynésie française', 1, 0, '', '/(987)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'pyf', 'PF', null);
        $territories[] = new Territory('French Southern and Antarctic Lands', 'Terres australes et antarctiques françaises', 'Terres australes et antarctiques françaises', 'French Southern and Antarctic Lands', 'Terres australes et antarctiques françaises', 'Terres australes et antarctiques françaises', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'atf', 'TF', null);
        $territories[] = new Territory('Gabon', 'Gabon', 'Gabon', 'Gabonese Republic', 'République gabonaise', 'République gabonaise', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gab', 'GA', null);
        $territories[] = new Territory('Gambia, The', 'Gambie', 'The Gambia', 'Republic of The Gambia', 'République de Gambie', 'Republic of The Gambia', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gmb', 'GM', null);
        $territories[] = new Territory('Georgia', 'Géorgie', 'საქართველო', 'Georgia', 'Géorgie', 'საქართველო', 0, 0, '', '/\\d{4}/', '', self::CENTER_ALIGNED_TO_LEFT, 'geo', 'GE', null);
        $territories[] = new Territory('Germany', 'Allemagne', 'Deutschland', 'Federal Republic of Germany', 'République fédérale d’Allemagne', 'Bundesrepublik Deutschland', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'deu', 'DE', null);
        $territories[] = new Territory('Ghana', 'Ghana', 'Ghana', 'Republic of Ghana', 'République du Ghana', 'Republic of Ghana', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gha', 'GH', null);
        $territories[] = new Territory('Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 1, 0, '', '/(GX11 1AA)/', '', self::LEFT_ALIGNED_TO_LEFT, 'gib', 'GI', null);
        $territories[] = new Territory('Greece', 'Grèce', 'Ελλάδα', 'Hellenic Republic', 'République hellénique', 'Ελληνική Δημοκρατία', 0, 0, '', '/\\d{3}\\s\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'grc', 'GR', null);
        $territories[] = new Territory('Greenland', 'Groenland', 'Kalaallit Nunaat / Grønland', 'Greenland', 'Groenland', 'Kalaallit Nunaat / Grønland', 1, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'grl', 'GL', null);
        $territories[] = new Territory('Grenada', 'Grenade', 'Grenada', 'Grenada', 'Grenada', 'Grenada', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'grd', 'GD', null);
        $territories[] = new Territory('Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 1, 0, '', '/(971)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'glp', 'GP', null);
        $territories[] = new Territory('Guam', 'Guam', 'Guam', 'Guam', 'Guam', 'Guam', 1, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gum', 'GU', null);
        $territories[] = new Territory('Guatemala', 'Guatemala', 'Guatemala', 'Republic of Guatemala', 'République du Guatemala', 'República de Guatemala', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gtm', 'GT', null);
        $territories[] = new Territory('Guernsey', 'Guernesey', 'Guernsey', 'Guernsey', 'Guernesey', 'Guernsey', 1, 0, '', '/(GY)(\\d{1})\\s(\\d{1})([A-Z]{2})/', '', self::LEFT_ALIGNED_TO_LEFT, 'ggy', 'GG', null);
        $territories[] = new Territory('Guinea', 'Guinée', 'Guinée', 'Republic of Guinea', 'République de Guinée', 'République de Guinée', 0, 0, '', '/\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gin', 'GN', null);
        $territories[] = new Territory('Guinea-Bissau', 'Guiné-Bissau', 'Guiné-Bissau', 'Republic of Guinea-Bissau', 'République de Guinée-Bissau', 'República da Guiné-Bissau', 0, 0, '', '/\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'gnb', 'GW', null);
        $territories[] = new Territory('Guyana', 'Guyana', 'Guyana', 'Co-operative Republic of Guyana', 'République coopérative du Guyana', 'Co-operative Republic of Guyana', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'guy', 'GY', null);
        $territories[] = new Territory('Haiti', 'Haïti', 'Haiti', 'Republic of Haiti', 'République d\'Haïti', 'République d\'Haïti', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'hti', 'HT', null);
        $territories[] = new Territory('Heard Island and McDonald Islands', 'îles Heard-et-MacDonald', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'îles Heard-et-MacDonald', 'Heard Island and McDonald Islands', 1, 0, '', '/($^)/', '', self::LEFT_ALIGNED_TO_LEFT, 'hmd', 'HM', null);
        $territories[] = new Territory('Honduras', 'Honduras', 'Honduras', 'Republic of Honduras', 'République du Honduras', 'República de Honduras', 0, 0, '', '/([A-Z]{2})\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'hnd', 'HN', null);
        $territories[] = new Territory('Hong Kong', 'Hong Kong', 'Hongkong / 香港', 'Special Administrative Region of Hongkong', 'Hong Kong', 'Hongkong / 香港', 1, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'hkg', 'HK', null);
        $territories[] = new Territory('Hungary', 'Hongrie', 'Magyarország', 'Hungary', 'Hongrie', 'Magyarország', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'hun', 'HU', null);
        $territories[] = new Territory('Iceland', 'Islande', 'Ísland', 'Iceland', 'Islande', 'Ísland', 0, 0, '', '/\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'isl', 'IS', null);
        $territories[] = new Territory('India', 'Inde', 'India / भारत', 'Republic of India', 'République de l\'Inde', 'Bhārat Gaṇarājya', 0, 0, '', '/\\d{3}\\s?\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ind', 'IN', null);
        $territories[] = new Territory('Indonesia', 'Indonésie', 'Indonesia', 'Republic of Indonesia', 'République d\'Indonésie', 'Republic of Indonesia', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'idn', 'ID', null);
        $territories[] = new Territory('Iran', 'Iran', 'ایران', 'Islamic Republic of Iran', 'République islamique d\'Iran', 'جمهوری اسلامی ایران', 0, 0, '', '/\\d{10}/', '', self::LEFT_ALIGNED_TO_LEFT, 'irn', 'IR', null);
        $territories[] = new Territory('Iraq', 'Irak', 'العراق', 'Republic of Iraq', 'République d\'Irak', 'جمهورية العراق', 0, 0, '', '/\\d{5}/', '', self::LEFT_ALIGNED_TO_LEFT, 'irq', 'IQ', null);
        $territories[] = new Territory('Ireland', 'Irlande', 'Ireland / Éire', 'Ireland', 'Irlande', 'Ireland / Éire', 0, 0, '', '/([A-Z]\\d{2}\\s[A-Z]\\d[A-Z]\\d)|([A-Z]\\d{2}\\s[A-Z]{2}\\d{2})|([A-Z]\\d{2}\\s[A-Z]\\d[A-Z]{2})|((D6W)\\s[A-Z]\\d[A-Z]\\d)|((D6W)\\s[A-Z]{2}\\d{2})|((D6W)\\s[A-Z]\\d[A-Z]{2})/', '', self::LEFT_ALIGNED_TO_LEFT, 'irl', 'IE', null);
        $territories[] = new Territory('Isle of Man', 'Île de Man', 'Isle of Man / Ellan Vannin', 'Isle of Man', 'Île de Man', 'Isle of Man / Ellan Vannin', 1, 0, '', '/(IM)(\\d{1})\\s(\\d{1})([A-Z]{2})/', '', self::LEFT_ALIGNED_TO_LEFT, 'imn', 'IM', null);
        $territories[] = new Territory('Israel', 'Israël', 'ישראל', 'State of Israel', 'État d’Israël', 'מְדִינַת יִשְׂרָאֵל', 0, 0, '', '/\\d{7}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'isr', 'IL', null);
        $territories[] = new Territory('Italy', 'Italie', 'Italia', 'Italian Republic', 'République italienne', 'Repubblica Italiana', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ita', 'IT', null);
        $territories[] = new Territory('Jamaica', 'Jamaïque', 'Jamaica', 'Jamaica', 'Jamaïque', 'Jamaica', 0, 0, '', '/\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'jam', 'JM', null);
        $territories[] = new Territory('Japan', 'Japon', '日本', 'Japan', 'Japon', '日本', 0, 0, '', '/\\d{3}-\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'jpn', 'JP', null);
        $territories[] = new Territory('Jersey', 'Jersey', 'Jersey / Jèrri', 'Jersey', 'Jersey', 'Jersey / Jèrri', 1, 0, '', '/(JE)(\\d{1})\\s(\\d{1})([A-Z]{2})/', '', self::LEFT_ALIGNED_TO_LEFT, 'jey', 'JE', null);
        $territories[] = new Territory('Jordan', 'Jordanie', 'الأردن', 'Hashemite Kingdom of Jordan', 'Royaume hachémite de Jordanie', 'المملكة الأردنية الهاشمية', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_RIGHT, 'jor', 'JO', null);
        $territories[] = new Territory('Kazakhstan', 'Kazakhstan', 'Қазақстан', 'Republic of Kazakhstan', 'République du Kazakhstan', 'Қазақстан Республикасы', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'kaz', 'KZ', null);
        $territories[] = new Territory('Kenya', 'Kenya', 'Kenya', 'Republic of Kenya', 'République du Kenya', 'Republic of Kenya', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'ken', 'KE', null);
        $territories[] = new Territory('Kiribati', 'Kiribati', 'Kiribati', 'Republic of Kiribati', 'République des Kiribati', 'Republic of Kiribati', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'kir', 'KI', null);
        $territories[] = new Territory('Korea, North', 'Corée du Nord', '조선', 'Democratic People\'s Republic of Korea', 'République populaire démocratique de Corée', '조선민주주의인민공화국', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'prk', 'KP', null);
        $territories[] = new Territory('Korea, South', 'Corée du Sud', '한국', 'Republic of Korea', 'République de Corée', '대한민국', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'kor', 'KR', null);
        $territories[] = new Territory('Kosovo', 'Kosovo', 'Kosovo', 'Republic of Kosovo', 'République du Kosovo', 'Republika e Kosovës', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'xsk', 'XK', null);
        $territories[] = new Territory('Kuwait', 'Koweït', 'دولة الكويت', 'State of Kuwait', 'Émirat du Koweït', 'دولة الكويت', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'kwt', 'KW', null);
        $territories[] = new Territory('Kyrgyzstan', 'Kirghizistan', 'Кыргызстан', 'Kyrgyz Republic', 'République kirghize', 'Кыргыз Республикасы', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'kgz', 'KG', null);
        $territories[] = new Territory('Laos', 'Laos', 'ປະເທດລາວ', 'Lao People\'s Democratic Republic', 'République démocratique populaire lao', 'ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lao', 'LA', null);
        $territories[] = new Territory('Latvia', 'Lettonie', 'Latvija', 'Republic of Latvia', 'République de Lettonie', 'Latvijas Republika', 0, 0, '', '/(LV)-\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lva', 'LV', null);
        $territories[] = new Territory('Lebanon', 'Liban', 'لبنان', 'Lebanese Republic', 'République libanaise', 'الجمهورية اللبنانية', 0, 0, '', '/(\\d{5})|(\\d{4}\\s\\d{4})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lbn', 'LB', null);
        $territories[] = new Territory('Lesotho', 'Lesotho', 'Lesotho', 'Kingdom of Lesotho', 'Royaume du Lesotho', 'Kingdom of Lesotho', 0, 0, '', '/\\d{3}/', '', self::CENTER_CENTERED, 'lso', 'LS', null);
        $territories[] = new Territory('Liberia', 'Liberia', 'Liberia', 'Republic of Liberia', 'République du Liberia', 'Republic of Liberia', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lbr', 'LR', null);
        $territories[] = new Territory('Libya', 'Libye', 'ليبيا', 'State of Libya', 'État de Libye', 'دولة ليبيا', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lby', 'LY', null);
        $territories[] = new Territory('Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Principality of Liechtenstein', 'Principauté de Liechtenstein', 'Fürstentum Liechtenstein', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lie', 'LI', null);
        $territories[] = new Territory('Lithuania', 'Lituanie', 'Lietuva', 'Republic of Lithuania', 'République de Lituanie', 'Lietuvos Respublika', 0, 0, '', '/(LT)-\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ltu', 'LT', null);
        $territories[] = new Territory('Luxembourg', 'Luxembourg', 'Luxembourg / Lëtzebuerg', 'Grand Duchy of Luxembourg', 'Grand-Duché de Luxembourg', 'Groussherzogtum Lëtzebuerg', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lux', 'LU', null);
        $territories[] = new Territory('Macau', 'Macao', 'Macau / 澳門', 'Special Administrative Region of Macau', 'Macao', 'Macau / 澳門', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mac', 'MO', null);
        $territories[] = new Territory('Macedonia', 'République de Macédoine', 'Македонија', 'Republic of Macedonia', 'République de Macédoine', 'Република Македонија', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mkd', 'MK', null);
        $territories[] = new Territory('Madagascar', 'Madagascar', 'Madagasikara', 'Republic of Madagascar', 'République de Madagascar', 'Repoblikan\'i Madagasikara', 0, 0, '', '/\\d{3}/', '', self::CENTER_ALIGNED_TO_LEFT, 'mdg', 'MG', null);
        $territories[] = new Territory('Malawi', 'Malawi', 'Malawi', 'Republic of Malawi', 'République du Malawi', 'Republic of Malawi', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mwi', 'MW', null);
        $territories[] = new Territory('Malaysia', 'Malaisie', 'Malaysia', 'Malaysia', 'Malaisie', 'Malaysia', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'mys', 'MY', null);
        $territories[] = new Territory('Maldives', 'Maldives', 'ދިވެހިރާއްޖެ', 'Republic of Maldives', 'République des Maldives', 'ދިވެހިރާއްޖޭގެ ޖުމްހޫރިއްޔާ', 0, 0, '', '/\\d{5}/', '', self::CENTER_CENTERED, 'mdv', 'MV', null);
        $territories[] = new Territory('Mali', 'Mali', 'Mali', 'Republic of Mali', 'République du Mali', 'République du Mali', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mli', 'ML', null);
        $territories[] = new Territory('Malta', 'Malte', 'Malta', 'Republic of Malta', 'République de Malte', 'Republic of Malta', 0, 0, '', '/([A-Z]{3}\\s\\d{4})/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mlt', 'MT', null);
        $territories[] = new Territory('Marshall Islands', 'Îles Marshall', 'Aorōkin M̧ajeļ', 'Republic of the Marshall Islands', 'République des Îles Marshall', 'Republic of the Marshall Islands', 0, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mhl', 'MH', null);
        $territories[] = new Territory('Martinique', 'Martinique', 'Martinique', 'Martinique', 'Martinique', 'Martinique', 1, 0, '', '/(972)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mtq', 'MQ', null);
        $territories[] = new Territory('Mauritania', 'Mauritanie', 'موريتانيا', 'Islamic Republic of Mauritania', 'République islamique de Mauritanie', 'الجمهورية الإسلامية الموريتانية', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mrt', 'MR', null);
        $territories[] = new Territory('Mauritius', 'Mauritius', 'Mauritius', 'Republic of Mauritius', 'République de Maurice', 'République de Maurice', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'mus', 'MU', null);
        $territories[] = new Territory('Mayotte', 'Mayotte', 'Mayotte', 'Mayotte', 'Mayotte', 'Mayotte', 1, 0, '', '/(976)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'myt', 'YT', null);
        $territories[] = new Territory('Mexico', 'Mexique', 'México / Mēxihco', 'United Mexican States', 'États-Unis mexicains', 'Estados Unidos Mexicanos', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mex', 'MX', null);
        $territories[] = new Territory('Micronesia', 'Micronésie', 'Federated States of Micronesia', 'Federated States of Micronesia', 'États fédérés de Micronésie', 'Federated States of Micronesia', 0, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'fsm', 'FM', null);
        $territories[] = new Territory('Moldova', 'Moldavie', 'Moldova', 'Republic of Moldova', 'République de Moldavie', 'Republica Moldova', 0, 0, '', '/(MD-)\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mda', 'MD', null);
        $territories[] = new Territory('Monaco', 'Monaco', 'Monaco', 'Principality of Monaco', 'Principauté de Monaco', 'Principauté de Monaco', 0, 0, '', '/(980)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mco', 'MC', null);
        $territories[] = new Territory('Mongolia', 'Mongolie', 'Монгол Улс', 'Mongolia', 'Mongolie', 'Монгол Улс', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mng', 'MN', null);
        $territories[] = new Territory('Montenegro', 'Monténégro', 'Crna Gora', 'Montenegro', 'Monténégro', 'Crna Gora', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mne', 'ME', null);
        $territories[] = new Territory('Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 1, 0, '', '/(MSR\\s)(1)\\d{3}/', '', self::CENTER_ALIGNED_TO_LEFT, 'msr', 'MS', null);
        $territories[] = new Territory('Morocco', 'Maroc', 'المغرب', 'Kingdom of Morocco', 'Royaume du Maroc', 'المملكة المغربية', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mar', 'MA', null);
        $territories[] = new Territory('Mozambique', 'Mozambique', 'Moçambique', 'Republic of Mozambique', 'République du Mozambique', 'República de Moçambique', 0, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_RIGHT, 'moz', 'MZ', null);
        $territories[] = new Territory('Myanmar', 'Myanmar', 'မြန်မာ', 'Republic of the Union of Myanmar', 'République de l\'Union du Myanmar', 'ပြည်ထောင်စု သမ္မတ မြန်မာနိုင်ငံတော်‌', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'mmy', 'MM', null);
        $territories[] = new Territory('Namibia', 'Namibia', 'Namibia', 'Republic of Namibia', 'République de Namibie', 'Republic of Namibia', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'nam', 'NA', null);
        $territories[] = new Territory('Nauru', 'Nauru', 'Nauru / Naoero', 'Republic of Nauru', 'République de Nauru', 'Repubrikin Naoero', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'nru', 'NR', null);
        $territories[] = new Territory('Nepal', 'Népal', 'नेपाल', 'Federal Democratic Republic of Nepal', 'République démocratique fédérale du Népal', 'सङ्घीय लोकतान्त्रिक गणतन्त्र नेपाल', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'npl', 'NP', null);
        $territories[] = new Territory('Netherlands', 'Pays-Bas', 'Nederland', 'Kingdom of the Netherlands', 'Royaume des Pays-Bas', 'Koninkrijk der Nederlanden', 0, 0, '', '/\\d{4}\\s([A-Z]){2}/', '', self::CENTER_ALIGNED_TO_LEFT, 'nld', 'NL', null);
        $territories[] = new Territory('New Caledonia', 'Nouvelle-Calédonie', 'Nouvelle-Calédonie', 'New Caledonia', 'Nouvelle-Calédonie', 'Nouvelle-Calédonie', 1, 0, '', '/(988)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ncl', 'NC', null);
        $territories[] = new Territory('New Zealand', 'Nouvelle-Zélande', 'New Zealand / Aotearoa', 'New Zealand', 'Nouvelle-Zélande', 'New Zealand / Aotearoa', 0, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'nzl', 'NZ', null);
        $territories[] = new Territory('Nicaragua', 'Nicaragua', 'Nicaragua', 'Republic of Nicaragua', 'République du Nicaragua', 'República de Nicaragua', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'nic', 'NI', null);
        $territories[] = new Territory('Niger', 'Nigeria', 'Niger', 'Republic of Niger', 'République du Niger', 'République du Niger', 0, 0, '', '/\\d{4}/', '', self::CENTER_CENTERED, 'ner', 'NE', null);
        $territories[] = new Territory('Nigeria', 'Nigeria', 'Nigeria', 'Federal Republic of Nigeria', 'République fédérale du Nigeria', 'Federal Republic of Nigeria', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'nga', 'NG', null);
        $territories[] = new Territory('Niue', 'Niue', 'Niue / Niuē', 'Niue', 'Niue', 'Niue / Niuē', 1, 0, '', '/($^)/', '', self::LEFT_ALIGNED_TO_LEFT, 'niu', 'NU', null);
        $territories[] = new Territory('Norfolk Island', 'Île Norfolk', 'Norf\'k Ailen', 'Norfolk Island', 'Île Norfolk', 'Norf\'k Ailen', 1, 0, '', '/\\d{4}/', '', self::LEFT_ALIGNED_TO_LEFT, 'nfk', 'NK', null);
        $territories[] = new Territory('Northern Cyprus', 'Chypre du Nord', 'Kuzey Kıbrıs', 'Turkish Republic of Northern Cyprus', 'République turque de Chypre du Nord', 'Kuzey Kıbrıs Türk Cumhuriyeti', 0, 1, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'XX-NC', null);
        $territories[] = new Territory('Northern Mariana Islands', 'Îles Mariannes du Nord', 'Nothern Mariana Islands', 'Northern Mariana Islands', 'Îles Mariannes du Nord', 'Nothern Mariana Islands', 1, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'mnp', 'MP', null);
        $territories[] = new Territory('Norway', 'Norvège', 'Norge', 'Kingdom of Norway', 'Royaume de Norvège', 'Kongeriket Norge', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'nor', 'NO', null);
        $territories[] = new Territory('Oman', 'Oman', 'عُمان', 'Sultanate of Oman', 'Sultanat d\'Oman', 'سلطنة عُمان', 0, 0, '', '/\\d{3}/', '', self::LEFT_ALIGNED_TO_RIGHT, 'omn', 'OM', null);
        $territories[] = new Territory('Pakistan', 'Pakistan', 'پاکستان', 'Islamic Republic of Pakistan', 'République islamique du Pakistan', 'اِسلامی جمہوریہ پاكِستان‬', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'pak', 'PK', null);
        $territories[] = new Territory('Palau', 'Palaos', 'Belau', 'Republic of Palau', 'République des Palaos', 'Beluu er a Belau', 0, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'plw', 'PW', null);
        $territories[] = new Territory('Palestine', 'Palestine', 'فلسطين', 'State of Palestine', 'État de Palestine', 'دولة فلسطين', 0, 1, '', '/(\\d{3})?/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'PS', null);
        $territories[] = new Territory('Panama', 'Panama', 'Panamá', 'Republic of Panama', 'République du Panama', 'República de Panamá', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'pan', 'PA', null);
        $territories[] = new Territory('Papua New Guinea', 'Papouasie-Nouvelle-Guinée', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'État indépendant de Papouasie-Nouvelle-Guinée', 'Independent State of Papua New Guinea', 0, 0, '', '/\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'png', 'PG', null);
        $territories[] = new Territory('Paraguay', 'Paraguay', 'Paraguay', 'Republic of Paraguay', 'République du Paraguay', 'República del Paraguay', 0, 0, '', '/\\d{4}/', '', self::CENTER_CENTERED, 'pry', 'PY', null);
        $territories[] = new Territory('Peru', 'Pérou', 'Perú', 'Republic of Peru', 'République du Pérou', 'República del Perú', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'per', 'PE', null);
        $territories[] = new Territory('Philippines', 'Philippines', 'Pilipinas', 'Republic of the Philippines', 'République des Philippines', 'Republika ng Pilipinas', 0, 0, '', '/\\d{4}/', '', self::CENTER_ALIGNED_TO_LEFT, 'phl', 'PH', null);
        $territories[] = new Territory('Pitcairn Islands', 'Îles Pitcairn', 'Pitcairn Islands / Pitkern Ailen', 'Pitcairn Islands', 'Îles Pitcairn', 'Pitcairn Islands / Pitkern Ailen', 1, 0, '', '/(PCRN 1ZZ)/', '', self::LEFT_ALIGNED_TO_LEFT, 'pcn', 'PN', null);
        $territories[] = new Territory('Poland', 'Pologne', 'Polska', 'Republic of Poland', 'République de Pologne', 'Rzeczpospolita Polska', 0, 0, '', '/\\d{2}-\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'pol', 'PL', null);
        $territories[] = new Territory('Portugal', 'Portugal', 'Portugal', 'Portuguese Republic', 'République portugaise', 'República Portuguesa', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'prt', 'PT', null);
        $territories[] = new Territory('Puerto Rico', 'Porto Rico', 'Puerto Rico', 'Puerto Rico', 'Porto Rico', 'Puerto Rico', 1, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'pri', 'PR', null);
        $territories[] = new Territory('Qatar', 'Qatar', 'قطر', 'State of Qatar', 'État du Qatar', 'دولة قطر', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'qat', 'QA', null);
        $territories[] = new Territory('Réunion', 'Réunion', 'Réunion', 'Réunion', 'Réunion', 'Réunion', 1, 0, '', '/(974)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'reu', 'RE', null);
        $territories[] = new Territory('Romania', 'Roumanie', 'România', 'Romania', 'Roumanie', 'România', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'rou', 'RO', null);
        $territories[] = new Territory('Russia', 'Russie', 'Россия', 'Russian Federation', 'Fédération de Russie', 'Росси́йская Федерaция', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'rus', 'RU', null);
        $territories[] = new Territory('Rwanda', 'Rwanda', 'Rwanda', 'Republic of Rwanda', 'République du Rwanda', 'Repubulika y\'u Rwanda', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'rwa', 'RW', null);
        $territories[] = new Territory('Saba', 'Saaba', 'Saaba', 'Saaba', 'Saaba', 'Saaba', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bes', 'BQ', null);
        $territories[] = new Territory('Sahrawi Arab Democratic Republic', 'Sahara occidental', 'الجمهورية العربية الصحراوية الديمقراطية‎', 'Sahrawi Arab Democratic Republic', 'République arabe sahraouie démocratique', 'الجمهورية العربية الصحراوية الديمقراطية‎', 0, 1, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'EH', null);
        $territories[] = new Territory('Saint Barthélemy', 'Saint-Barthélemy', 'Saint-Barthélemy', 'Saint Barthélemy', 'Saint-Barthélemy', 'Saint-Barthélemy', 1, 0, '', '/(97133)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'blm', 'BL', null);
        $territories[] = new Territory('Saint Helena', 'Sainte-Hélène', 'Saint Helena', 'Saint Helena', 'Sainte-Hélène', 'Saint Helena', 1, 0, '', '/(STHL 1ZZ)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'shn', 'SH', null);
        $territories[] = new Territory('Saint Kitts and Nevis', 'Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'Fédération de Saint-Christophe-et-Niévès', 'Saint Kitts and Nevis', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'kna', 'KN', null);
        $territories[] = new Territory('Saint Lucia', 'Sainte-Lucie', 'Saint Lucia', 'Saint Lucia', 'Sainte-Lucie', 'Saint Lucia', 0, 0, '', '/(LC)\\d{2}\\s\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lca', 'LC', null);
        $territories[] = new Territory('Saint Martin', 'Saint-Martin', 'Saint-Martin', 'Saint Martin', 'Saint-Martin', 'Saint-Martin', 1, 0, '', '/(97150)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'maf', 'MF', null);
        $territories[] = new Territory('Saint Pierre and Miquelon', 'Saint-Pierre et Miquelon', 'Saint-Pierre et Miquelon', 'Saint Pierre and Miquelon', 'Saint-Pierre et Miquelon', 'Saint-Pierre et Miquelon', 1, 0, '', '/(97500)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'spm', 'PM', null);
        $territories[] = new Territory('Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines', 'Saint Vincent and the Grenadines', 0, 0, '', '/(VC)\\d{4}/', '', self::CENTER_ALIGNED_TO_LEFT, 'vct', 'VC', null);
        $territories[] = new Territory('Samoa', 'Samoa', 'Samoa / Sāmoa', 'Independent State of Samoa', 'État indépendant des Samoa', 'Malo Saʻoloto Tutoʻatasi o Sāmoa', 0, 0, '', '/(WS)\\d{4}/', '', self::CENTER_ALIGNED_TO_LEFT, 'wsm', 'WS', null);
        $territories[] = new Territory('San Marino', 'Saint-Marin', 'San Marino', 'Republic of San Marino', 'République de Saint-Marin', 'Repubblica di San Marino', 0, 0, '', '/(4789)\\d{1}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'smr', 'SM', null);
        $territories[] = new Territory('São Tomé and Príncipe', 'Sao Tomé-et-Principe', 'São Tomé e Príncipe', 'Democratic Republic of São Tomé and Príncipe', 'République démocratique de Sao Tomé-et-Principe', 'República Democrática de São Tomé e Príncipe', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'stp', 'ST', null);
        $territories[] = new Territory('Saudi Arabia', 'L\'Arabie saoudite', 'المملكة العربية السعودية', 'Kingdom of Saudi Arabia', 'Royaume d\'Arabie saoudite', 'المملكة العربية السعودية', 0, 0, '', '/(\\d{5})(-\\d{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sau', 'SA', null);
        $territories[] = new Territory('Senegal', 'Sénégal', 'Sénégal', 'Republic of Senegal', 'République du Sénégal', 'République du Sénégal', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sen', 'SN', null);
        $territories[] = new Territory('Serbia', 'Serbie', 'Србија', 'Republic of Serbia', 'République de Serbie', 'Република Србија', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'srb', 'RS', null);
        $territories[] = new Territory('Seychelles', 'Seychelles', 'Seychelles', 'Republic of Seychelles', 'République des Seychelles', 'République des Seychelles', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'syc', 'SC', null);
        $territories[] = new Territory('Sierra Leone', 'Sierra Leone', 'Sierra Leone', 'Republic of Sierra Leone', 'République de Sierra Leone', 'Republic of Sierra Leone', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sle', 'SL', null);
        $territories[] = new Territory('Singapore', 'Singapour', 'Singapura / Singapore', 'Republic of Singapore', 'République de Singapour', 'Republic of Singapore', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sgp', 'SG', null);
        $territories[] = new Territory('Sint Eustatius', 'Sint Eustatius', 'Sint Eustatius', 'Sint Eustatius', 'Sint Eustatius', 'Sint Eustatius', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'bes', 'BQ', null);
        $territories[] = new Territory('Sint Maarten', 'Sint Maarten', 'Sint Maarten', 'Sint Maarten', 'Sint Maarten', 'Sint Maarten', 1, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sxm', 'SX', null);
        $territories[] = new Territory('Slovakia', 'Slovaquie', 'Slovensko', 'Slovak Republic', 'République slovaque', 'Slovenská republika', 0, 0, '', '/\\d{3}\\s\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'svk', 'SK', null);
        $territories[] = new Territory('Slovenia', 'Slovénie', 'Slovenija', 'Republic of Slovenia', 'République de Slovénie', 'Republika Slovenija', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'svn', 'SI', null);
        $territories[] = new Territory('Solomon Islands', 'Îles Salomon', 'Solomon Islands / Solomon Aelan', 'Solomon Islands', 'Îles Salomon', 'Solomon Islands / Solomon Aelan', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'slb', 'SB', null);
        $territories[] = new Territory('Somalia', 'Somalie', 'Soomaaliya', 'Federal Republic of Somalia', 'République fédérale de Somalie', 'Jamhuuriyadda Federaalka Soomaaliya', 0, 0, '', '/([A-Z]){2}\\s\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'som', 'SO', null);
        $territories[] = new Territory('Somaliland', 'Somaliland', 'Somaliland', 'Republic of Somaliland', 'République du Somaliland', 'Republic of Somaliland', 0, 1, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'XX-SO', null);
        $territories[] = new Territory('South Africa', 'Afrique du Sud', 'South Africa / Suid-Afrika', 'Republic of South Africa', 'République d\'Afrique du Sud', 'Republic of South Africa', 0, 0, '', '/\\d{4}/', '', self::CENTER_ALIGNED_TO_LEFT, 'zaf', 'ZA', null);
        $territories[] = new Territory('South Georgia and the South Sandwich Islands', 'Géorgie du Sud-et-les îles Sandwich du Sud', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud-et-les îles Sandwich du Sud', 'South Georgia and the South Sandwich Islands', 1, 0, '', '/(SIQQ 1ZZ)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sgs', 'GS', null);
        $territories[] = new Territory('South Ossetia', 'Ossétie du Sud', 'Хуссар Ирыстон', 'Republic of South Ossetia', 'République d\'Ossétie du Sud-Alanie', 'Республикӕ Хуссар Ирыстон', 0, 1, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'XX-OS', null);
        $territories[] = new Territory('South Sudan', 'Soudan du Sud', 'South Sudan', 'Republic of South Sudan', 'République du Soudan du Sud', 'Republic of South Sudan', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ssd', 'SS', null);
        $territories[] = new Territory('Spain', 'Espagne', 'España', 'Kingdom of Spain', 'Royaume d’Espagne', 'Reino de España', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'esp', 'ES', null);
        $territories[] = new Territory('Sri Lanka', 'Sri Lanka', 'ශ්‍රී ලංකාව', 'Democratic Socialist Republic of Sri Lanka', 'République démocratique socialiste du Sri Lanka', 'ශ්‍රී ලංකා ප්‍රජාතාන්ත්‍රික සමාජවාදී ජනරජය', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'lka', 'LK', null);
        $territories[] = new Territory('Sudan', 'Soudan', 'السودان', 'Republic of the Sudan', 'République du Soudan', 'جمهورية السودان', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sdn', 'SD', null);
        $territories[] = new Territory('Suriname', 'Suriname', 'Suriname', 'Republic of Suriname', 'République du Suriname', 'Republiek Suriname', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'sur', 'SR', null);
        $territories[] = new Territory('Svalbard', 'Svalbard', 'Svalbard', 'Svalbard', 'Svalbard', 'Svalbard', 1, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'sjm', 'SJ', null);
        $territories[] = new Territory('Swaziland (eSwatini)', 'Swaziland', 'eSwatini', 'Kingdom of eSwatini', 'Royaume du Swaziland', 'Umbuso weSwatini', 0, 0, '', '/[A-Z]\\d{3}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'swz', 'SZ', null);
        $territories[] = new Territory('Sweden', 'Suède', 'Sverige', 'Kingdom of Sweden', 'Royaume de Suède', 'Konungariket Sverige', 0, 0, '', '/\\d{3}\\s\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'swe', 'SE', null);
        $territories[] = new Territory('Switzerland', 'Suisse', 'Schweiz / Suisse', 'Swiss Confederation', 'Confédération suisse', 'Schweizerische Eidgenossenschaft', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'che', 'CH', null);
        $territories[] = new Territory('Syria', 'Syrie', 'سورية', 'Syrian Arab Republic', 'République arabe syrienne', 'الجمهورية العربية السورية', 0, 0, '', '/($^)/', '', self::CENTER_CENTERED, 'syr', 'SY', null);
        $territories[] = new Territory('Taiwan', 'République de Chine', '臺灣/台灣', 'Republic of China', 'République de Chine', '中華民國 ', 0, 0, '', '/(\\d{3})(-\\d{2})?/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'TW', null);
        $territories[] = new Territory('Tajikistan', 'Tadjikistan', 'Тоҷикистон', 'Republic of Tajikistan', 'République du Tadjikistan', 'Ҷумҳурии Тоҷикистон', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tjk', 'TJ', null);
        $territories[] = new Territory('Tanzania', 'Tanzanie', 'Tanzania', 'United Republic of Tanzania', 'République unie de Tanzanie', 'Jamhuri ya Muungano wa Tanzania', 0, 0, '', '/\\d{5}/', '', self::CENTER_ALIGNED_TO_LEFT, 'tza', 'TZ', null);
        $territories[] = new Territory('Thailand', 'Thaïlande', 'เมืองไทย', 'Kingdom of Thailand', 'Royaume de Thaïlande', 'ราชอาณาจักรไทย', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tha', 'TH', null);
        $territories[] = new Territory('Togo', 'Togo', 'Togo', 'Togolese Republic', 'République Togolaise', 'République Togolaise', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tgo', 'TG', null);
        $territories[] = new Territory('Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 0, 0, '', '/($^)/', '', self::LEFT_ALIGNED_TO_LEFT, 'tkl', 'TK', null);
        $territories[] = new Territory('Tonga', 'Tonga', 'Tonga', 'Kingdom of Tonga', 'Royaume des Tonga', 'Kingdom of Tonga', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ton', 'TO', null);
        $territories[] = new Territory('Transnistria', 'Transnistrie', 'Приднестровье', 'Pridnestrovian Moldavian Republic', 'République moldave du Dniestr', 'Република Молдовеняскэ Нистрянэ', 0, 1, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, null, 'XX-TN', null);
        $territories[] = new Territory('Trinidad and Tobago', 'Trinité-et-Tobago', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'République de Trinité-et-Tobago', 'Republic of Trinidad and Tobago', 0, 0, '', '/\\d{6}/', '', self::CENTER_ALIGNED_TO_LEFT, 'tto', 'TT', null);
        $territories[] = new Territory('Tristan da Cuhna', 'Tristan da Cunha', 'Tristan da Cuhna', 'Tristan da Cuhna', 'Tristan da Cunha', 'Tristan da Cuhna', 1, 0, '', '/(TDCU 1ZZ)/', '', self::LEFT_ALIGNED_TO_LEFT, 'taa', 'SH', null);
        $territories[] = new Territory('Tunisia', 'Tunisie', 'تونس', 'Tunisian Republic', 'République tunisienne', 'الجمهورية التونسية', 0, 0, '', '/\\d{4}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tun', 'TN', null);
        $territories[] = new Territory('Turkey', 'Turquie', 'Türkiye', 'Republic of Turkey', 'République de Turquie', 'Türkiye Cumhuriyeti', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tur', 'TR', null);
        $territories[] = new Territory('Turkmenistan', 'Turkménistan', 'Türkmenistan', 'Turkmenistan', 'Turkménistan', 'Türkmenistan', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tkm', 'TM', null);
        $territories[] = new Territory('Turks and Caicos Islands', 'Îles Turques-et-Caïques', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Îles Turques-et-Caïques', 'Turks and Caicos Islands', 1, 0, '', '/(TKCA 1ZZ)/', '', self::CENTER_CENTERED, 'tca', 'TC', null);
        $territories[] = new Territory('Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'tuv', 'TV', null);
        $territories[] = new Territory('U.S. Virgin Islands', 'Îles Vierges des États-Unis', 'U.S. Virgin Islands', 'United States Virgin Islands', 'Îles Vierges des États-Unis', 'United States Virgin Islands', 1, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'vir', 'VI', null);
        $territories[] = new Territory('Uganda', 'Ouganda', 'Uganda', 'Republic of Uganda', 'République d’Ouganda', 'Republic of Uganda', 0, 0, '', '/($^)/', '', self::CENTER_ALIGNED_TO_LEFT, 'uga', 'UG', null);
        $territories[] = new Territory('Ukraine', 'Ukraine', 'Україна', 'Ukraine', 'Ukraine', 'Україна', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ukr', 'UA', null);
        $territories[] = new Territory('United Arab Emirates', 'Émirats arabes unis', 'الإمارات العربيّة المتّحدة', 'United Arab Emirates', 'Émirats arabes unis', 'الإمارات العربيّة المتّحدة', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'are', 'AE', null);
        $territories[] = new Territory('United Kingdom', 'Royaume-Uni', 'United Kingdom', 'United Kingdom of Great Britain and Northern Ireland', 'Royaume-Uni de Grande-Bretagne et d\'Irlande du Nord', 'United Kingdom of Great Britain and Nothern Ireland', 0, 0, '', '/([A-Z]{2})(\\d{1})\\s(\\d{1})([A-Z]{2})/', '', self::LEFT_ALIGNED_TO_LEFT, 'gbr', 'GB', null);
        $territories[] = new Territory('United States', 'États-Unis', 'United States', 'United States of America', 'États-Unis d\'Amérique', 'United States of America', 0, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'usa', 'US', null);
        $territories[] = new Territory('United States Minor Outlying Islands', 'Îles mineures éloignées des États-Unis', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'Îles mineures éloignées des États-Unis', 'United States Minor Outlying Islands', 1, 0, '', '/[0-9]{5}(-[0-9]{4})?/', '', self::RIGHT_ALIGNED_TO_LEFT, 'umi', 'UM', null);
        $territories[] = new Territory('Uruguay', 'Uruguay', 'Uruguay', 'Oriental Republic of Uruguay', 'République orientale de l\'Uruguay', 'República Oriental del Uruguay', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ury', 'UY', null);
        $territories[] = new Territory('Uzbekistan', 'Ouzbékistan', 'Ўзбекистон', 'Republic of Uzbekistan', 'O\'zbekiston', 'O\'zbekiston Respublikasi', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'uzb', 'UZ', null);
        $territories[] = new Territory('Vanuatu', 'Vanuatu', 'Vanuatu', 'Republic of Vanuatu', 'République de Vanuatu', 'Ripablik blong Vanuatu', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'vut', 'VU', null);
        $territories[] = new Territory('Vatican City', 'Vatican', 'Città del Vaticano', 'Vatican City State', 'État de la Cité du Vatican', 'Città del Vaticano', 0, 0, '', '/(00120)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'vat', 'VA', null);
        $territories[] = new Territory('Venezuela', 'Venezuela', 'Venezuela', 'Bolivarian Republic of Venezuela', 'République bolivarienne du Venezuela', 'República Bolivariana de Venezuela', 0, 0, '', '/(\\d{4})|(\\d{4}-[A-Z])/', '', self::RIGHT_ALIGNED_TO_LEFT, 'ven', 'VE', null);
        $territories[] = new Territory('Vietnam', 'Viêt Nam', 'Việt Nam', 'Socialist Republic of Vietnam', 'République socialiste du Viêt Nam', 'Cộng hòa xã hội chủ nghĩa Việt Nam', 0, 0, '', '/\\d{6}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'vnm', 'VN', null);
        $territories[] = new Territory('Wallis and Futuna', 'Wallis-et-Futuna', 'Wallis-et-Futuna', 'Wallis and Futuna', 'Wallis-et-Futuna', 'Wallis-et-Futuna', 1, 0, '', '/(986)\\d{2}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'wlf', 'WF', null);
        $territories[] = new Territory('Yemen', 'Yémen', 'اليمن', 'Republic of Yemen', 'République du Yémen', 'اَلْـجُـمْـهُـوْرِيَّـة الْـيَـمَـنِـيَّـة', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'yem', 'YE', null);
        $territories[] = new Territory('Zambia', 'Zambie', 'Zambia', 'Republic of Zambia', 'République de Zambie', 'Republic of Zambia', 0, 0, '', '/\\d{5}/', '', self::RIGHT_ALIGNED_TO_LEFT, 'zmb', 'ZM', null);
        $territories[] = new Territory('Zimbabwe', 'Zimbabwe', 'Zimbabwe', 'Republic of Zimbabwe', 'République du Zimbabwe', 'Republic of Zimbabwe', 0, 0, '', '/($^)/', '', self::RIGHT_ALIGNED_TO_LEFT, 'zwe', 'ZW', null);

        foreach ($territories as $t) {
            $t->setEmoji($this->isoToEmoji($t->getIso3166()));
            $this->territoryRepository->save($t);
        }

        $io->success('Loading data completed successfully');

        return Command::SUCCESS;
    }
}
