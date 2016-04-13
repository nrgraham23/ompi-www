<?php
$topdir = "../../../..";
# Note that we must use the PHP "$$" indirection to assign to the
# "title" variable, because if we list "$ title" (without the space)
# in this file, Doxygen will replace it with a string title.
$ver = basename(getcwd());
$thwarting_doxygen_preprocessor = "title";
$$thwarting_doxygen_preprocessor = "Portable Hardware Locality (hwloc) Documentation: $ver";
$header_include_file = "$topdir/projects/hwloc/doc/$ver/www.open-mpi.org-css.inc";
include_once("$topdir/projects/hwloc/nav.inc");
include_once("$topdir/includes/header.inc");
include_once("$topdir/includes/code.inc");
?>
<!-- Generated by Doxygen 1.8.8 -->
  <div id="navrow1" class="tabs">
    <ul class="tablist">
      <li><a href="index.php"><span>Main&#160;Page</span></a></li>
      <li><a href="pages.php"><span>Related&#160;Pages</span></a></li>
      <li><a href="modules.php"><span>Modules</span></a></li>
      <li class="current"><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
    </ul>
  </div>
  <div id="navrow2" class="tabs2">
    <ul class="tablist">
      <li><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
      <li><a href="functions.php"><span>Data&#160;Fields</span></a></li>
    </ul>
  </div>
<div id="nav-path" class="navpath">
  <ul>
<li class="navelem"><a class="el" href="a00039.php">hwloc_obj_attr_u</a></li><li class="navelem"><a class="el" href="a00032.php">hwloc_bridge_attr_s</a></li>  </ul>
</div>
</div><!-- top -->
<div class="header">
  <div class="summary">
<a href="#pub-attribs">Data Fields</a>  </div>
  <div class="headertitle">
<div class="title">hwloc_obj_attr_u::hwloc_bridge_attr_s Struct Reference<div class="ingroups"><a class="el" href="a00077.php">Object Structure and Attributes</a></div></div>  </div>
</div><!--header-->
<div class="contents">

<p><code>#include &lt;<a class="el" href="a00065_source.php">hwloc.h</a>&gt;</code></p>
<table class="memberdecls">
<tr class="heading"><td colspan="2"><h2 class="groupheader"><a name="pub-attribs"></a>
Data Fields</h2></td></tr>
<tr class="memitem:a00ce9d99fc8792d1044fe25dc58605fe"><td class="memItemLeft" >union {</td></tr>
<tr class="memitem:afbfb960b5aaf2b6e10d8d5d424b227d7"><td class="memItemLeft" >&#160;&#160;&#160;struct <a class="el" href="a00044.php">hwloc_pcidev_attr_s</a>&#160;&#160;&#160;<a class="el" href="a00032.php#ab5c564e7c95b747dae9eb84ec0a2c31e">pci</a></td></tr>
<tr class="separator:afbfb960b5aaf2b6e10d8d5d424b227d7"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:a00ce9d99fc8792d1044fe25dc58605fe"><td class="memItemLeft" valign="top">}&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00032.php#a00ce9d99fc8792d1044fe25dc58605fe">upstream</a></td></tr>
<tr class="separator:a00ce9d99fc8792d1044fe25dc58605fe"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:a265dd2164aa2df4972e25a029da72125"><td class="memItemLeft" align="right" valign="top"><a class="el" href="a00076.php#ga0a947e8c5adcc729b126bd09c01a0153">hwloc_obj_bridge_type_t</a>&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00032.php#a265dd2164aa2df4972e25a029da72125">upstream_type</a></td></tr>
<tr class="separator:a265dd2164aa2df4972e25a029da72125"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:acaf1ae02e37182bbb6966f8c4f35e499"><td class="memItemLeft" >union {</td></tr>
<tr class="memitem:af93b3f8c762d7a849b968cb3caf58365"><td class="memItemLeft" >&#160;&#160;&#160;struct {</td></tr>
<tr class="memitem:afcdd4077c7c574e4791eefbdf8fb5d9e"><td class="memItemLeft" >&#160;&#160;&#160;&#160;&#160;&#160;unsigned short&#160;&#160;&#160;<a class="el" href="a00032.php#a2c31e565a5f0d23d0a0a3dd3ec8f4b17">domain</a></td></tr>
<tr class="separator:afcdd4077c7c574e4791eefbdf8fb5d9e"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:a5e2836eb053bf87e3f7430b5470dedca"><td class="memItemLeft" >&#160;&#160;&#160;&#160;&#160;&#160;unsigned char&#160;&#160;&#160;<a class="el" href="a00032.php#ae2d9dd73ef1d32045c584a8e66d2f83f">secondary_bus</a></td></tr>
<tr class="separator:a5e2836eb053bf87e3f7430b5470dedca"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:aae5989d9a424dd74ff22da89e6ed245b"><td class="memItemLeft" >&#160;&#160;&#160;&#160;&#160;&#160;unsigned char&#160;&#160;&#160;<a class="el" href="a00032.php#af3f3f7d76bf03e8d2afa721c2b8d6771">subordinate_bus</a></td></tr>
<tr class="separator:aae5989d9a424dd74ff22da89e6ed245b"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:af93b3f8c762d7a849b968cb3caf58365"><td class="memItemLeft" valign="top">&#160;&#160;&#160;}&#160;&#160;&#160;<a class="el" href="a00032.php#a5a20be20e09d811d141b6332ff864706">pci</a></td></tr>
<tr class="separator:af93b3f8c762d7a849b968cb3caf58365"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:acaf1ae02e37182bbb6966f8c4f35e499"><td class="memItemLeft" valign="top">}&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00032.php#acaf1ae02e37182bbb6966f8c4f35e499">downstream</a></td></tr>
<tr class="separator:acaf1ae02e37182bbb6966f8c4f35e499"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:ac6a169b672d0e9f75756fd5665828b93"><td class="memItemLeft" align="right" valign="top"><a class="el" href="a00076.php#ga0a947e8c5adcc729b126bd09c01a0153">hwloc_obj_bridge_type_t</a>&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00032.php#ac6a169b672d0e9f75756fd5665828b93">downstream_type</a></td></tr>
<tr class="separator:ac6a169b672d0e9f75756fd5665828b93"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:a336c8b22893d5d734d8c9dfca4066b46"><td class="memItemLeft" align="right" valign="top">unsigned&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00032.php#a336c8b22893d5d734d8c9dfca4066b46">depth</a></td></tr>
<tr class="separator:a336c8b22893d5d734d8c9dfca4066b46"><td class="memSeparator" colspan="2">&#160;</td></tr>
</table>
<a name="details" id="details"></a><h2 class="groupheader">Detailed Description</h2>
<div class="textblock"><p>Bridge specific Object Attribues. </p>
</div><h2 class="groupheader">Field Documentation</h2>
<a class="anchor" id="a336c8b22893d5d734d8c9dfca4066b46"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">unsigned hwloc_obj_attr_u::hwloc_bridge_attr_s::depth</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="a2c31e565a5f0d23d0a0a3dd3ec8f4b17"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">unsigned short hwloc_obj_attr_u::hwloc_bridge_attr_s::domain</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="acaf1ae02e37182bbb6966f8c4f35e499"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">union { ... }   hwloc_obj_attr_u::hwloc_bridge_attr_s::downstream</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="ac6a169b672d0e9f75756fd5665828b93"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname"><a class="el" href="a00076.php#ga0a947e8c5adcc729b126bd09c01a0153">hwloc_obj_bridge_type_t</a> hwloc_obj_attr_u::hwloc_bridge_attr_s::downstream_type</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="a5a20be20e09d811d141b6332ff864706"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">struct { ... }   hwloc_obj_attr_u::hwloc_bridge_attr_s::pci</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="ab5c564e7c95b747dae9eb84ec0a2c31e"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">struct <a class="el" href="a00044.php">hwloc_pcidev_attr_s</a> hwloc_obj_attr_u::hwloc_bridge_attr_s::pci</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="ae2d9dd73ef1d32045c584a8e66d2f83f"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">unsigned char hwloc_obj_attr_u::hwloc_bridge_attr_s::secondary_bus</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="af3f3f7d76bf03e8d2afa721c2b8d6771"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">unsigned char hwloc_obj_attr_u::hwloc_bridge_attr_s::subordinate_bus</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="a00ce9d99fc8792d1044fe25dc58605fe"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">union { ... }   hwloc_obj_attr_u::hwloc_bridge_attr_s::upstream</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<a class="anchor" id="a265dd2164aa2df4972e25a029da72125"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname"><a class="el" href="a00076.php#ga0a947e8c5adcc729b126bd09c01a0153">hwloc_obj_bridge_type_t</a> hwloc_obj_attr_u::hwloc_bridge_attr_s::upstream_type</td>
        </tr>
      </table>
</div><div class="memdoc">

</div>
</div>
<hr/>The documentation for this struct was generated from the following file:<ul>
<li><a class="el" href="a00065_source.php">hwloc.h</a></li>
</ul>
</div><!-- contents -->
<?php
include_once("$topdir/includes/footer.inc");
