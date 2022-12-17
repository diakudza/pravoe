<form  class="flex mt-10">

    <select name="filterStatus" onchange="getValToSort(this)" class="select select-bordered">
        <option disabled checked>Сортировать по..</option>
        <option value="" @selected(request('filterStatus') == '') >Без сортировки</option>
        <option value="inwork" @selected(request('filterStatus') =='inwork')>В работе</option>
        <option value="new" @selected(request('filterStatus') =='new')>Новые</option>
        <option value="completed" @selected(request('filterStatus') == 'completed')>Завершенные</option>
    </select>
    <button class="btn">Сортировать</button>
</form>


