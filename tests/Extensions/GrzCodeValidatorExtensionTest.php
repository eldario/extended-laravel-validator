<?php

namespace AvtoDev\ExtendedLaravelValidator\Tests\Extensions;

use AvtoDev\ExtendedLaravelValidator\Extensions\GrzCodeValidatorExtension;

class GrzCodeValidatorExtensionTest extends AbstractExtensionTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getExtensionClassName()
    {
        return GrzCodeValidatorExtension::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidValues()
    {
        return [
            // Слишком длинные
            'Р394242КК190',
            'С73321НХ197',
            'Е7350МО750',
            'М396СРХ46',
            'А137НОО89',
            'К898КМ4054',
            'К8948КМ404',

            // Слишком короткие
            'У752НХ1',
            'А548ВР7',
            'Н58ХС38',
            'Е47ЕВ190',
            'О386А40',
            'С06ОУ777',
            'Р295К102',

            // Содержащие пробелы
            'Р295 КА102',
            'Р239УЕ777 ',
            ' О461ОВ750',
            '  К005АВ77 ',
            'Е 029 ХВ 70',

            // Содержащие латиницу
            'Т085KР123',
            'У700КX61',
            'K988СC82',
            'Т039КP60',
            'E751УХ197',
            'С572EY777',

            // Содержащие запрещенные символы
            'Н416ТЯ161',
            'Ю477ЕМ178',
            'Н090ЫН777',
            'Ф399УН777',
            'Е986НЪ199',
            'М441ЕЦ73',
            'Р842ЭН777',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getValidValues()
    {
        return [
            // М000ММ77 или М000ММ777 (тип 1 - Для легковых, грузовых, грузопассажирских ТС и автобусов)
            'М000ММ77',
            'М000ММ777',
            'А825МС716',
            'Р392КК190',
            'С731НХ197',
            'Е750МО750',
            'М396СХ46',
            'А137НО89',
            'К898КМ40',
            'О772ТХ197',
            'В771ЕК126',
            'Х894СВ59',
            'Е373ТА73',
            'А777АА77',
            'О704КО190',
            'У868УК26',
            'М824РН78',
            'Т149ОЕ190',
            'Т293ТА178',
            'О476ЕЕ750',
            'В168ТС190',
            'У460УА77',
            'Т258СА77',
            'С475РУ777',
            'Р295ЕЕ178',
            'Х918УУ116',
            'Х116РЕ96',
            'У888ЕК99',
            'О292ОМ77',
            'С989ЕР72',
            'К324МУ750',
            'Е228РХ33',
            'О166РУ174',
            'Н492ТН197',
            'К206МХ32',
            'Р515ЕР19',
            'Н416ТЕ161',
            'У477ЕМ178',
            'Н090РН777',
            'В399УН777',
            'Е986НХ199',
            'М441ЕЕ73',
            'Р842СН777',
            'У914ВХ123',
            'Р181СК161',
            'У371ВН142',
            'У752НХ178',
            'А548ВР750',
            'Н580ХС38',
            'Е427ЕВ190',
            'О386АА40',
            'С061ОУ777',
            'Р295КА102',
            'Р239УЕ777',
            'О461ОВ750',
            'К005АВ77',
            'Е029ХВ70',
            'У956УС777',
            'А528КТ37',
            'Р602ВС86',
            'Р048ОА750',
            'Е251ВК82',
            'Е966РА777',
            'Н340АХ199',
            'Т555СН42',
            'К052ОУ178',
            'М333МВ161',
            'А028ЕУ178',
            'С326ХО199',
            'С976РТ98',
            'Н388ЕУ750',
            'М770РВ161',
            'М828МР02',
            'О377ЕТ750',
            'Е697ХС163',
            'Т612ХХ47',
            'В750КО777',
            'Т085КР123',
            'У700КХ61',
            'К988СС82',
            'Т039КР60',
            'Е751УХ197',
            'С572ЕУ777',
            'Е393МН33',
            'С552ВХ102',
            'Н327СМ777',
            'А284АР777',
            'У606КЕ33',
            'у828хк47',
            'о590тт98',
            'у092су98',
            'о168ре197',
            'т900мм77',
            'т462ко750',
            'р012ма34',
            'у188ру174',
            'в164ое190',
            'о832вт31',
            'е237оа77',
            'а098аа99',
            'е105ту777',
            'е683св777',
            'м010ее26',
            'в199хн199',

            // М000ММ (тип 1А - Для легковых ТС должностных лиц)
            'М000ММ',
            'О772ТХ',
            'В771ЕК',
            'Х894СВ',
            'Е373ТА',
            'А777АА',
            'О704КО',
            'У868УК',
            'М824РН',
            'Т149ОЕ',
            'Т293ТА',
            'О476ЕЕ',
            'В168ТС',
            'У460УА',
            'Т258СА',
            'С475РУ',
            'Р295ЕЕ',
            'Х918УУ',
            'Х116РЕ',
            'У888ЕК',
            'О292ОМ',
            'С989ЕР',
            'К324МУ',
            'Е228РХ',
            'О166РУ',
            'Н492ТН',
            'К206МХ',
            'Р515ЕР',
            'Н416ТЕ',
            'У477ЕМ',
            'Н090РН',
            'В399УН',
            'Е986НХ',
            'М441ЕЕ',
            'Р842СН',
            'о292ом',
            'с989ер',
            'к324му',
            'е228рх',
            'о166ру',
            'н492тн',
            'к206мх',
            'р515ер',
            'н416те',
            'у477ем',
            'н090рн',
            'в399ун',
            'е986нх',
            'м441ее',
            'р842сн',

            // ММ00077 (тип 1Б - Для легковых ТС, исп. для перевозки людей на коммерческой основе, автобусов)
            // ММ00077 (тип 2 - Для автомобильных прицепов и полуприцепов)
            'ММ00077',
            'СХ39646',
            'НО13789',
            'КМ89840',
            'СВ89459',
            'ТА37373',
            'АА77777',
            'УК86826',
            'РН82478',
            'УА46077',
            'СА25877',
            'РЕ11696',
            'ЕК88899',
            'ОМ29277',
            'ЕР98972',
            'РХ22833',
            'МХ20632',
            'ЕР51519',
            'ЕЕ44173',
            'ХС58038',
            'са25877',
            'ре11696',
            'ек88899',
            'ом29277',
            'ер98972',
            'рх22833',
            'мх20632',
            'ер51519',
            'ее44173',
            'хс58038',

            // 0000ММ77 (тип 3 - Для тракторов, самоходных дорожно-строительных машин и иных машин и прицепов)
            // 0000ММ77 (тип 4 - Для мотоциклов, мотороллеров, мопедов)
            // 0000ММ77 (тип 5 - Для легковых, грузовых, грузопассажирских автомобилей и автобусов)
            // 0000ММ77 (тип 7 - Для тракторов, самоходных дорожно-строительных машин и иных машин и прицепов)
            // 0000ММ77 (тип 8 - Для мотоциклов, мотороллеров, мопедов)
            '0000ММ77',
            '6868УК26',
            '2824РН78',
            '6460УА77',
            '5258СА77',
            '1116РЕ96',
            '8888ЕК99',
            '9292ОМ77',
            '8989ЕР72',
            '2228РХ33',
            '0206МХ32',
            '1515ЕР19',
            '4441ЕЕ73',
            '8580ХС38',
            '8386АА40',
            '0005АВ77',
            '2029ХВ70',
            '2528КТ37',
            '0602ВС86',
            '5251ВК82',
            '5555СН42',
            '7976РТ98',
            '2828МР02',
            '1612ХХ47',
            '0700КХ61',
            '8988СС82',
            '3039КР60',
            '9393МН33',
            '0606КЕ33',
            '2029хв70',
            '2528кт37',
            '0602вс86',
            '5251вк82',
            '5555сн42',
            '7976рт98',
            '2828мр02',
            '1612хх47',
            '0700кх61',
            '8988сс82',
            '3039кр60',
            '9393мн33',
            '0606ке33',

            // ММ000077 (тип 6 - Для автомобильных прицепов и полуприцепов)
            'ММ000077',
            'УК868626',
            'МН824278',
            'УА460677',
            'ТА258577',
            'ХЕ116196',
            'УК888899',
            'ОМ292977',
            'СР989872',
            'ЕХ228233',
            'КХ206032',
            'РР515119',
            'МЕ441473',
            'НС580838',
            'ОА386840',
            'КВ005077',
            'ЕВ029270',
            'АТ528237',
            'РС602086',
            'ЕК251582',
            'ТН555542',
            'СТ976798',
            'МР828202',
            'ТХ612147',
            'УХ700061',
            'КС988882',
            'ТР039360',
            'ЕН393933',
            'УЕ606033',
            'кв005077',
            'ев029270',
            'ат528237',
            'рс602086',
            'ек251582',
            'тн555542',
            'ст976798',
            'мр828202',
            'тх612147',
            'ух700061',
            'кс988882',
            'тр039360',
            'ен393933',
            'уе606033',

            // М000077 (тип 20 - Для легковых, грузовых, грузопассажирских автомобилей и автобусов)
            'М000077',
            'К868626',
            'Н824278',
            'А460677',
            'А258577',
            'Е116196',
            'К888899',
            'М292977',
            'Р989872',
            'Х228233',
            'Х206032',
            'Р515119',
            'Е441473',
            'С580838',
            'А386840',
            'В005077',
            'В029270',
            'Т528237',
            'С602086',
            'К251582',
            'Н555542',
            'Т976798',
            'Р828202',
            'Х612147',
            'Х700061',
            'С988882',
            'Р039360',
            'Н393933',
            'Е606033',
            'в005077',
            'в029270',
            'т528237',
            'с602086',
            'к251582',
            'н555542',
            'т976798',
            'р828202',
            'х612147',
            'х700061',
            'с988882',
            'р039360',
            'н393933',
            'е606033',

            // 000М77 (тип 21 - Для автомобильных прицепов и полуприцепов)
            '000М77',
            '866К26',
            '822Н78',
            '466А77',
            '255А77',
            '111Е96',
            '888К99',
            '299М77',
            '988Р72',
            '222Х33',
            '200Х32',
            '511Р19',
            '444Е73',
            '588С38',
            '388А40',
            '000В77',
            '022В70',
            '522Т37',
            '600С86',
            '255К82',
            '555Н42',
            '977Т98',
            '822Р02',
            '611Х47',
            '700Х61',
            '988С82',
            '033Р60',
            '399Н33',
            '600Е33',
            '000в77',
            '022в70',
            '522т37',
            '600с86',
            '255к82',
            '555н42',
            '977т98',
            '822р02',
            '611х47',
            '700х61',
            '988с82',
            '033р60',
            '399н33',
            '600е33',

            // 0000М77 (тип 22 - Для мотоциклов)
            '0000М77',
            '6868У26',
            '2824Р78',
            '6460У77',
            '5258С77',
            '1116Р96',
            '8888Е99',
            '9292О77',
            '8989Е72',
            '2228Р33',
            '0206М32',
            '1515Е19',
            '4441Е73',
            '8580Х38',
            '8386А40',
            '0005А77',
            '2029Х70',
            '2528К37',
            '0602В86',
            '5251В82',
            '5555С42',
            '7976Р98',
            '2828М02',
            '1612Х47',
            '0700К61',
            '8988С82',
            '3039К60',
            '9393М33',
            '0606К33',
            '2029х70',
            '2528к37',
            '0602в86',
            '5251в82',
            '5555с42',
            '7976р98',
            '2828м02',
            '1612х47',
            '0700к61',
            '8988с82',
            '3039к60',
            '9393м33',
            '0606к33',
        ];
    }
}
