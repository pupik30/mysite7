<?php
// Устанавливаем заголовки для Web API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

// Созаем Ключивые поля для кв
class PriceListEntry {
        public function __construct(
        public int $id,
        public string $apartmentType,
        public float $pricePerMeter,
        public float $utilityPerPerson
    ) {}
}
//Создаем  Ключивые поля для сьемщиков (Жилец)
class Tenant {
    public function __construct(
        public int $id,
        public string $ownerName,
        public int $residentsCount,
        public float $livingArea,
        public string $apartmentType,
        public float $apartmentValue = 0.0, // Стоимость кв
        public float $totalRent = 0.0       // сумма квартплаты
    ) {}
}
// создаем ПрайсЛмст со всеми товаарам и присваивааем им ну эти как их там
$priceList = [
    'Однокомнатная'   => new PriceListEntry(1, 'Однокомнатная', 50.0, 300.0),
    'Двухкомнатная'   => new PriceListEntry(2, 'Двухкомнатная', 45.0, 280.0),
    'Трехкомнатная'   => new PriceListEntry(3, 'Трехкомнатная', 40.0, 260.0),
    'Студия'          => new PriceListEntry(4, 'Студия', 60.0, 350.0),
    'Лофт'            => new PriceListEntry(5, 'Лофт', 70.0, 400.0),
    'Пентхаус'        => new PriceListEntry(6, 'Пентхаус', 100.0, 600.0),
    'Коммунальная'    => new PriceListEntry(7, 'Коммунальная', 30.0, 200.0),
];
//тоже самое но с жильцами
$tenants = [
    new Tenant(1,  'Иванов И.И.',   2, 45.5,  'Однокомнатная', 4500000),
    new Tenant(2,  'Петров П.П.',   3, 60.0,  'Двухкомнатная', 6000000),
    new Tenant(3,  'Сидоров С.С.',  1, 30.0,  'Студия',        3500000),
    new Tenant(4,  'Кузнецов А.А.', 4, 85.0,  'Трехкомнатная', 8500000),
    new Tenant(5,  'Смирнов Б.Б.',  2, 120.0, 'Пентхаус',      25000000),
    new Tenant(6,  'Попов В.В.',    1, 40.0,  'Лофт',          7000000),
    new Tenant(7,  'Васильев Г.Г.', 5, 20.0,  'Коммунальная',  1500000),
    new Tenant(8,  'Иванов И.И.',   2, 45.5,  'Однокомнатная', 4500000),
    new Tenant(9,  'Петров П.П.',   4, 62.0,  'Двухкомнатная', 6200000),
    new Tenant(10, 'Михайлов Д.Д.', 1, 32.0,  'Студия',        3600000),
    new Tenant(11, 'Федоров Е.Е.',  3, 80.0,  'Трехкомнатная', 8000000),
    new Tenant(12, 'Смирнов Б.Б.',  2, 125.0, 'Пентхаус',      26000000),
    new Tenant(13, 'Новиков Ж.Ж.',  1, 42.0,  'Лофт',          7200000),
    new Tenant(14, 'Морозов З.З.',  2, 22.0,  'Коммунальная',  1600000),
    new Tenant(15, 'Волков К.К.',   3, 65.0,  'Двухкомнатная', 6500000),
];









$final = [];
$totalDebtSum = 0.0;

foreach ($tenants as $tenant) {
    if (!isset($priceList[$tenant->apartmentType])) {//пытаемся найти тарифы для квартиры этого жильца.
        continue;
    }
    //?


    $rate = $priceList[$tenant->apartmentType];
    $costForArea = $tenant->livingArea * $rate->pricePerMeter;
    $costForUtilities = $tenant->residentsCount * $rate->utilityPerPerson;

    // (S * Цена за м2) + (Жильцы * Цена за чел)
    $tenant->totalRent = $costForArea + $costForUtilities;
    $totalDebtSum += $tenant->totalRent;

    //ведомость
    $final[] = [
        'id' => $tenant->id,
        'owner' => $tenant->ownerName,
        'apartment_type' => $tenant->apartmentType,
        'living_area' => $tenant->livingArea,
        'residents' => $tenant->residentsCount,
        'calculation_details' => [
            'rate_per_meter' => $rate->pricePerMeter,
            'rate_per_person' => $rate->utilityPerPerson,
            'area_cost' => $costForArea,
            'utility_cost' => $costForUtilities
        ],
        'total_debt_amount' => round($tenant->totalRent, 2)
    ];
}
$response = [
    'status' => 'success',
    'generated_at' => date('Y-m-d H:i:s'),
    'report_title' => 'Ведомость задолжников по квартплате',
    'total_debt_all_tenants' => round($totalDebtSum, 2),
    'data' => $final
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);