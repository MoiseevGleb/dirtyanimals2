@extends('layouts.main')

@section('content')
    <div class="container mt-3 mt-lg-5">
        <h1>Кто мы?</h1>
        <p>Dirty Animals - это коллектив гангстеров и реперов, который владеет улицами своего города. Их основатели - четыре друга из детства, которые решили использовать свой талант в музыке, чтобы выбраться из жестокой реальности своей жизни. Dirty Animals пишут тексты, которые отражают их жизненный путь и борьбу, и объединяют всех, кто верит в силу музыки и жаждет перемен в своей жизни.</p>
        <div class="row mt-3">
            <div class="col-lg-3 col-sm-12 mb-sm-3 text-center">
                <img class="img-fluid rounded-circle mb-3" src="{{ asset('/storage/images/crew/leha.jpg') }}" alt="leha.jpg">
                <h2>Большой Блант</h2>
                <p>Меня зовут Big Blunt, я вырос в гетто, где я начал продавать наркотики и быстро занял свою нишу в банде. Я курю свои большие джойнты и знаю, что это жизнь на грани, но гетто стало для меня образом жизни, и я его принял.</p>
            </div>
            <div class="col-lg-3 col-sm-12 mb-sm-3 text-center">
                <img class="img-fluid rounded-circle mb-3" src="{{ asset('/storage/images/crew/igor.jpg') }}" alt="igor.jpg">
                <h2>Тяжелый Вес</h2>
                <p>Меня зовут Heavy Weight, я киллер. Я без эмоций и всегда готов к работе. Деньги - единственное, что имеет значение для меня. Никто не может заплатить за мою жизнь или жизнь моих близких. Я не прощаю и никогда не забываю. Я Heavy Weight, я киллер.</p>
            </div>
            <div class="col-lg-3 col-sm-12 mb-sm-3 text-center">
                <img class="img-fluid rounded-circle mb-3" src="{{ asset('/storage/images/crew/gleb.jpg') }}" alt="gleb.jpg">
                <h2>Пожилой Глеб</h2>
                <p>Я бывший гангстер, который потерял все свои деньги из-за обмана. Я решил отомстить и атаковал склад наркокартеля, захватив деньги, оружие и наркотики. Я вернул свои деньги и вновь стал править своей организацией с большей решимостью.</p>
            </div>
            <div class="col-lg-3 col-sm-12 mb-sm-3 text-center">
                <img class="img-fluid rounded-circle mb-3" src="{{ asset('/storage/images/crew/artem.jpg') }}" alt="artem.jpg">
                <h2>Громкий Секс</h2>
                <p>Меня зовут Loud Sex - я лучший битмейкер в городе. Моя музыка стала гимном гангстеров и я работаю со многими из них. Я люблю свою опасную жизнь и делаю ее еще более живой своими музыкальными творениями. Я Loud Sex, лучший битмейкер.</p>
            </div>
        </div>
        <h2 class="mt-lg-3">Ближайшие концерты</h2>
        <ol class="px-3">
            <li class="font-">Москва</li>
        </ol>
    </div>
@endsection
