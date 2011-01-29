<?
/**
 * @package    phpmyca
 * @author     Mike Green <mdgreen@gmail.com>
 * @copyright  Copyright (c) 2010, Mike Green
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
(basename($_SERVER['PHP_SELF']) == basename(__FILE__)) && die('Access Denied');

// get phpdboform object
$list =& $this->getVar('list');

// what is the id property?
$idProp   = $list->getIdProperty();
$linkProp = 0;
if (count($list->searchResults) > 0) {
	$ar = array_keys($list->searchResults[0]);
	$linkProp = $ar[1];
	}

// get base query string for viewing items
$qs_add    = $this->getActionQs(WA_ACTION_CSR_SERVER_ADD);
$base_qs   = $this->getActionQs($list->actionQsView,0);
$qs_back   = $this->getMenuQs(MENU_CERT_REQUESTS);
$class     = '';

// footer links
$l = array();
$this->addMenuLink($qs_add,'Generate Server CSR','greenoutline');
$this->addMenuLink($qs_back,'CSR Menu','greenoutline');
?>
<?= $this->getPageHeader(); ?>
<TABLE ALIGN="center" WIDTH="100%">
<?= $this->getFormListSearch($list); ?>

<?= $this->getListSortableHeader(&$list); ?>
<?
if (is_array($list->searchResults)) {
foreach($list->searchResults as $row) {
	$class = ($class == 'on') ? 'off' : 'on';
	$id = (isset($row[$idProp])) ? $row[$idProp] : false;
?>
	<TR>
<? foreach($row as $prop => $val) {
	if ($prop == $idProp) { continue; }
	$td = $val;
	if ($prop == $linkProp and is_numeric($id)) {
		if ($val == '') { $val = 'not set'; }
		$td = '<A HREF="' . $base_qs . $id . '">' . $val . '</A>';
		}
?>
		<TD CLASS="<?= $class; ?>"><?= $td; ?></TD>
<?	} ?>
	</TR>
<?	}
}
?>
<?= $this->getListPager(&$list); ?>
</TABLE>
<?= $this->getPageFooter(); ?>
