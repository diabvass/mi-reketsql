<?php
function ResultatTab($data)
{
    $iconTable = '<i class="fa-solid fa-table" style="color: var(--accent);"></i>';
    
    if ($data === null || empty($data)) {
        return <<<HTML
        <div class="resTab">
            <div class="header d-flex align-items-center gap-3 p-3">
                $iconTable
                <span class="fw-bold" style="color: var(--text-h)">Résultats</span>
            </div>
            <div class="dataNull p-5">
                <div class="icon mb-3">
                    <i class="fa-solid fa-inbox"></i>
                </div>
                <span style="color: var(--text)">Aucune donnée trouvée pour cette requête.</span>
            </div>
        </div>
        HTML;
    }

    $cols = array_keys($data[0]);
    $headers = implode('', array_map(fn($col) => '<th>' . htmlspecialchars($col) . '</th>', $cols));

    $rows = implode('', array_map(function($row) use ($cols) {
        $cells = implode('', array_map(fn($col) => "<td>" . htmlspecialchars($row[$col] ?? 'NULL') . "</td>", $cols));
        return "<tr>{$cells}</tr>";
    }, $data));

    $count = count($data);

    return <<<HTML
    <div class="resTab shadow-sm border">
        <div class="header d-flex align-items-center gap-3 p-3 border-bottom">
            $iconTable
            <span class="fw-bold" style="color: var(--text-h)">Résultats</span>
            <span class="ms-auto Nbligne small fw-bold">{$count} ligne(s)</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead><tr>{$headers}</tr></thead>
                <tbody>{$rows}</tbody>
            </table>
        </div>
    </div>
    HTML;
}