<form method="GET" class="filter-bar">

    <div class="filter-group">
        <input type="text"
            name="nis"
            placeholder="Cari NIS..."
            value="<?= $_GET['nis'] ?? '' ?>">
    </div>

    <div class="filter-group">
        <select name="sort">
            <option value="">Urutkan NIS</option>
            <option value="asc" <?= ($_GET['sort'] ?? '') == 'asc' ? 'selected' : '' ?>>Terkecil</option>
            <option value="desc" <?= ($_GET['sort'] ?? '') == 'desc' ? 'selected' : '' ?>>Terbesar</option>
        </select>
    </div>

    <div class="filter-actions">
        <button class="btn-filter">
            <i class="fa-solid fa-magnifying-glass"></i>
            Filter
        </button>

        <a href="/students" class="btn-reset">
            Reset
        </a>
    </div>

</form>