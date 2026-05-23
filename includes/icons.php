<?php
declare(strict_types=1);

function whatsapp_icon(): void
{
    echo '<svg class="icon icon-whatsapp" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.881 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>';
}

function product_icon(string $icon): void
{
    $icons = [
        'block' => '<rect x="4" y="6" width="7" height="5" rx=".5"/><rect x="13" y="6" width="7" height="5" rx=".5"/><rect x="4" y="13" width="7" height="5" rx=".5"/><rect x="13" y="13" width="7" height="5" rx=".5"/>',
        'slab' => '<path d="M3 14h18M5 10h14M7 6h10"/><line x1="3" y1="18" x2="21" y2="18"/>',
        'pavement' => '<rect x="3" y="10" width="6" height="6"/><rect x="9" y="10" width="6" height="6"/><rect x="15" y="10" width="6" height="6"/><rect x="6" y="16" width="6" height="6"/><rect x="12" y="16" width="6" height="6"/>',
        'fence' => '<line x1="6" y1="4" x2="6" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/><line x1="18" y1="4" x2="18" y2="20"/><line x1="4" y1="8" x2="20" y2="8"/><line x1="4" y1="14" x2="20" y2="14"/>',
        'coating' => '<path d="M4 20V8l8-4 8 4v12"/><path d="M8 20v-6h8v6"/>',
        'vent' => '<rect x="5" y="4" width="14" height="16" rx="1"/><path d="M9 8h6M9 12h6M9 16h6"/>',
        'tile' => '<rect x="4" y="4" width="7" height="7"/><rect x="13" y="4" width="7" height="7"/><rect x="4" y="13" width="7" height="7"/><rect x="13" y="13" width="7" height="7"/>',
        'drip' => '<path d="M4 6h16v3H4z"/><path d="M6 9v11M12 9v11M18 9v11"/>',
        'consulting' => '<circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 2"/>',
        'delivery' => '<path d="M3 12h13l3-4v8H3z"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/>',
        'support' => '<path d="M12 3l8 4v6c0 5-3.5 8-8 8s-8-3-8-8V7l8-4z"/><path d="M9 12l2 2 4-4"/>',
    ];

    $path = $icons[$icon] ?? $icons['block'];

    echo '<svg class="icon icon-product" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
        . $path
        . '</svg>';
}
