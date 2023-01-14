<div class='search'>
        <select name='doctor' id='doctor'>
            <option selected default >Ειδικότητα Ιατρού</option>
            <option value='Παθολόγος'>ΠΑΘΟΛΟΓΟΣ</option>
            <option value='Ψυχολόγος'>ΨΥΧΟΛΟΓΟΣ</option>
            <option value='Γυναικολόγος'>ΓΥΝΑΙΚΟΛΟΓΟΣ</option>
        </select>
        <select name='location' id='location'>
            <option selected default >Τοποθεσία</option>
            <option value='Θεσσαλονίκη'>ΘΕΣΣΑΛΟΝΙΚΗ</option>
            <option value='Αθήνα'>ΑΘΗΝΑ</option>
            <option value='Λάρισσα'>ΛΑΡΙΣΣΑ</option>
        </select>
    <button id='search_button' class='pink_background'>
    <i class='fa-solid fa-magnifying-glass' style='color:white;'></i>
    </button>
    <div class='livesearch'>
        <div class="form-group">
            <div class="input-group"><input type="text" name="mysearch" 
                id="mysearch" placeholder="Αναζήτησε..." class="form-control" /></div>
        </div>
    </div>
    <div id="showdata"></div>
</div>
