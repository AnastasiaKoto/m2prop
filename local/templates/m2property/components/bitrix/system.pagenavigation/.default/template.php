<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>
<?if($arResult["NavPageCount"] > 1):?>
    <?
    $showEllipsis = ($arResult["NavPageCount"] > 7);
    $maxVisiblePages = 7;
    
    // Вычисляем, какие страницы показывать
    $visiblePages = [];
    $currentPage = $arResult["NavPageNomer"];
    $totalPages = $arResult["NavPageCount"];
    
    if ($showEllipsis) {
        if ($currentPage <= 6) {
            // Показываем первые 7 страниц, многоточие и последнюю
            $visiblePages = range(1, $maxVisiblePages);
            $visiblePages[] = 'ellipsis';
            $visiblePages[] = $totalPages;
        } elseif ($currentPage >= $totalPages - 3) {
            // Показываем первую, многоточие и последние 5 страниц
            $visiblePages[] = 1;
            $visiblePages[] = 'ellipsis';
            $visiblePages = array_merge($visiblePages, range($totalPages - 4, $totalPages));
        } else {
            // Показываем первую, многоточие, текущую +/- 2, многоточие и последнюю
            $visiblePages[] = 1;
            $visiblePages[] = 'ellipsis';
            $visiblePages = array_merge($visiblePages, range($currentPage - 2, $currentPage + 2));
            $visiblePages[] = 'ellipsis';
            $visiblePages[] = $totalPages;
        }
    } else {
        // Показываем все страницы
        $visiblePages = range(1, $totalPages);
    }
    
    // Генерация URL для страниц
    function getPageUrl($pageNum, $arResult) {
		/*
        if ($pageNum == 1 && $arResult["bSavePage"] == false) {
            return $arResult["sUrlPath"] . $arResult["sUrlPathParams"];
        }
			*/
        return $arResult["sUrlPath"] . "?PAGEN_" . $arResult["NavNum"] . "=" . $pageNum . 
               ($arResult["NavQueryString"] ? "&" . $arResult["NavQueryString"] : "");
    }
    ?>
	<?if ($arResult["NavPageNomer"] > 1):?>
		<button class="pagintaion-arrow" onclick="window.location.href='<?=getPageUrl($arResult['NavPageNomer'] - 1, $arResult)?>'">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd"
					d="M10.2197 23.0312L3.18934 16.0009L10.2197 8.97059L11.2803 10.0312L6.06066 15.2509L27.75 15.2509L27.75 16.7509L6.06066 16.7509L11.2803 21.9706L10.2197 23.0312Z"
					fill="#242220" />
			</svg>
		</button>
	<?else:?>
		<button class="pagintaion-arrow" disabled style="opacity: 0.5;">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd"
					d="M10.2197 23.0312L3.18934 16.0009L10.2197 8.97059L11.2803 10.0312L6.06066 15.2509L27.75 15.2509L27.75 16.7509L6.06066 16.7509L11.2803 21.9706L10.2197 23.0312Z"
					fill="#242220" />
			</svg>
		</button>
	<?endif?>
	
	<ul class="pagination">
		<? foreach ($visiblePages as $pageItem): ?>
			<? if ($pageItem === 'ellipsis'): ?>
				<li>
					<a href="javascript:void(0)">
					...
					</a>
				</li>
			<? else: ?>
				<?
				$isCurrent = ($pageItem == $arResult["NavPageNomer"]);
				$pageUrl = getPageUrl($pageItem, $arResult);
				?>
				<?if ($isCurrent):?>
					<li>
						<a href="javascript:void(0)" class="current">
							<?=$pageItem?>
						</a>
					</li>
				<?else:?>
					<li>
						<a href="<?=$pageUrl?>">
							<?=$pageItem?>
						</a>
					</li>
				<?endif?>
			<? endif; ?>
		<? endforeach; ?>
	</ul>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<button class="pagintaion-arrow" onclick="window.location.href='<?=getPageUrl($arResult['NavPageNomer'] + 1, $arResult)?>'">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd"
					d="M21.7803 8.96875L28.8107 15.9991L21.7803 23.0294L20.7197 21.9688L25.9393 16.7491H4.25V15.2491H25.9393L20.7197 10.0294L21.7803 8.96875Z"
					fill="#242220" />
			</svg>
		</button>
	<?else:?>
		<button class="pagintaion-arrow" disabled style="opacity: 0.5;">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd"
					d="M21.7803 8.96875L28.8107 15.9991L21.7803 23.0294L20.7197 21.9688L25.9393 16.7491H4.25V15.2491H25.9393L20.7197 10.0294L21.7803 8.96875Z"
					fill="#242220" />
			</svg>
		</button>
	<?endif?>
<?endif;?>