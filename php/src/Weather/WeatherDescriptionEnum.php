<?php

namespace App\Weather;

enum WeatherDescriptionEnum: string
{
    case NULL = 'null';
    CASE ec = 'ec';
    CASE ci = 'ci';
    CASE c = 'c';
    CASE in = 'in';
    CASE pp = 'pp';
    CASE cm = 'cm';
    CASE cn = 'cn';
    CASE pt = 'pt';
    CASE pm = 'pm';
    CASE np = 'np';
    CASE pc = 'pc';
    CASE pn = 'pn';
    CASE cv = 'cv';
    CASE ch = 'ch';
    CASE t = 't';
    CASE ps = 'ps';
    CASE e = 'e';
    CASE n = 'n';
    CASE cl = 'cl';
    CASE nv = 'nv';
    CASE g = 'g';
    CASE ne = 'ne';
    CASE nd = 'nd';
    CASE pnt = 'pnt';
    CASE psc = 'psc';
    CASE pcm = 'pcm';
    CASE pct = 'pct';
    CASE pcn = 'pcn';
    CASE npt = 'npt';
    CASE npn = 'npn';
    CASE ncn = 'ncn';
    CASE nct = 'nct';
    CASE ncm = 'ncm';
    CASE npm = 'npm';
    CASE npp = 'npp';
    CASE vn = 'vn';
    CASE ct = 'ct';
    CASE ppn = 'ppn';
    CASE ppt = 'ppt';
    CASE ppm = 'ppm';

    /**
     * @return array<string, string>
     */
    public function getDescription(): array
    {
        return match ($this->value) {
            'ec' => [
                'description' => 'Encoberto com Chuvas Isoladas',
                'text' => 'Céu totalmente encoberto com chuvas em algumas regiões, sem aberturas de sol.',
            ],
            'ci' => [
                'description' => 'Chuvas Isoladas',
                'text' => 'Muitas nuvens com curtos períodos de sol e chuvas em algumas áreas.',
            ],
            'c' => [
                'description' => 'Chuva',
                'text' => 'Muitas nuvens e chuvas periódicas.',
            ],
            'in' => [
                'description' => 'Instável',
                'text' => 'Nebulosidade variável com chuva a qualquer hora do dia.',
            ],
            'pp' => [
                'description' => 'Possibilidade de Pancadas de Chuva',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de pancada de chuva.',
            ],
            'cm' => [
                'description' => 'Chuva pela Manhã',
                'text' => 'Chuva pela manhã melhorando ao longo do dia.',
            ],
            'cn' => [
                'description' => 'Chuva a Noite',
                'text' => 'Nebulosidade em aumento e chuvas durante a noite.',
            ],
            'pt' => [
                'description' => 'Pancadas de Chuva a Tarde',
                'text' => 'Predomínio de sol pela manhã. À tarde chove com trovoada.',
            ],
            'pm' => [
                'description' => 'Pancadas de Chuva pela Manhã',
                'text' => 'Chuva com trovoada pela manhã. À tarde o tempo abre e não chove.',
            ],
            'np' => [
                'description' => 'Nublado e Pancadas de Chuva',
                'text' => 'Muitas nuvens com curtos períodos de sol e pancadas de chuva com trovoadas.',
            ],
            'pc' => [
                'description' => 'Pancadas de Chuva',
                'text' => 'Chuva de curta duração e pode ser acompanhada de trovoadas a qualquer hora do dia.',
            ],
            'pn' => [
                'description' => 'Parcialmente Nublado',
                'text' => 'Sol entre poucas nuvens.',
            ],
            'cv' => [
                'description' => 'Chuvisco',
                'text' => 'Muitas nuvens e chuva fraca composta de pequenas gotas d´ água.',
            ],
            'ch' => [
                'description' => 'Chuvoso',
                'text' => 'Nublado com chuvas contínuas ao longo do dia.',
            ],
            't' => [
                'description' => 'Tempestade',
                'text' => 'Chuva forte capaz de gerar granizo e ou rajada de vento, com força destrutiva (Veloc. aprox. de 90 Km/h) e ou tornados.',
            ],
            'ps' => [
                'description' => 'Predomínio de Sol',
                'text' => 'Sol na maior parte do período.',
            ],
            'e' => [
                'description' => 'Encoberto',
                'text' => 'Céu totalmente encoberto, sem aberturas de sol.',
            ],
            'n' => [
                'description' => 'Nublado',
                'text' => 'Muitas nuvens com curtos períodos de sol.',
            ],
            'cl' => [
                'description' => 'Céu Claro',
                'text' => 'Sol durante todo o período. Ausência de nuvens.',
            ],
            'nv' => [
                'description' => 'Nevoeiro',
                'text' => 'Gotículas de água em suspensão que reduzem a visibilidade.',
            ],
            'g' => [
                'description' => 'Geada',
                'text' => 'Cobertura de cristais de gelo que se formam por sublimação direta sobre superfícies expostas cuja temperatura está abaixo do ponto de congelamento.',
            ],
            'ne' => [
                'description' => 'Neve',
                'text' => 'Vapor de água congelado na nuvem, que cai em forma de cristais e flocos.',
            ],
            'nd' => [
                'description' => 'Não Definido',
                'text' => 'Não Definido.',
            ],
            'pnt' => [
                'description' => 'Pancadas de Chuva a Noite',
                'text' => 'Chuva de curta duração podendo ser acompanhada de trovoadas à noite.',
            ],
            'psc' => [
                'description' => 'Possibilidade de Chuva',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva.',
            ],
            'pcm' => [
                'description' => 'Possibilidade de Chuva pela Manhã',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva pela manhã.',
            ],
            'pct' => [
                'description' => 'Possibilidade de Chuva a Tarde',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva pela tarde.',
            ],
            'pcn' => [
                'description' => 'Possibilidade de Chuva a Noite',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva à noite.',
            ],
            'npt' => [
                'description' => 'Nublado com Pancadas a Tarde',
                'text' => 'Muitas nuvens com curtos períodos de sol e pancadas de chuva com trovoadas à tarde.',
            ],
            'npn' => [
                'description' => 'Nublado com Pancadas a Noite',
                'text' => 'Muitas nuvens com curtos períodos de sol e pancadas de chuva com trovoadas à noite.',
            ],
            'ncn' => [
                'description' => 'Nublado com Possibilidade de Chuva à Noite',
                'text' => 'Muitas nuvens com curtos períodos de sol com pequena chance (inferior a 30%) de chuva à noite.',
            ],
            'nct' => [
                'description' => 'Nublado com Possibilidade de Chuva à Tarde',
                'text' => 'Muitas nuvens com curtos períodos de sol com pequena chance (inferior a 30%) de chuva à tarde.',
            ],
            'ncm' => [
                'description' => 'Nublado com Possibilidade de Chuva pela Manhã',
                'text' => 'Muitas nuvens com curtos períodos de sol com pequena chance (inferior a 30%) de chuva pela manhã.',
            ],
            'npm' => [
                'description' => 'Nublado com Pancadas pela Manhã',
                'text' => 'Muitas nuvens com curtos períodos de sol e chuva com trovoadas pela manhã.',
            ],
            'npp' => [
                'description' => 'Nublado com Possibilidade de Chuva',
                'text' => 'Muitas nuvens com curtos períodos de sol com pequena chance (inferior a 30%) de chuva a qualquer hora do dia.',
            ],
            'vn' => [
                'description' => 'Variação de Nebulosidade',
                'text' => 'Períodos curtos de sol intercalados com períodos de nuvens.',
            ],
            'ct' => [
                'description' => 'Chuva a Tarde',
                'text' => 'Nebulosidade em aumento e chuvas a partir da tarde.',
            ],
            'ppn' => [
                'description' => 'Possibilidade de Pancadas de Chuva à Noite',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva à noite.',
            ],
            'ppt' => [
                'description' => 'Possibilidade de Pancadas de Chuva à Tarde',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva pela tarde.',
            ],
            'ppm' => [
                'description' => 'Possibilidade de Pancadas de Chuva pela Manhã',
                'text' => 'Nebulosidade variável com pequena chance (inferior a 30%) de chuva pela manhã.',
            ],
        };
    }
}
