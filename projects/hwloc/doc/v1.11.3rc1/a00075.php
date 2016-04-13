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
      <li><a href="annotated.php"><span>Data&#160;Structures</span></a></li>
    </ul>
  </div>
</div><!-- top -->
<div class="header">
  <div class="summary">
<a href="#typedef-members">Typedefs</a>  </div>
  <div class="headertitle">
<div class="title">Object Sets (hwloc_cpuset_t and hwloc_nodeset_t)</div>  </div>
</div><!--header-->
<div class="contents">
<table class="memberdecls">
<tr class="heading"><td colspan="2"><h2 class="groupheader"><a name="typedef-members"></a>
Typedefs</h2></td></tr>
<tr class="memitem:ga4bbf39b68b6f568fb92739e7c0ea7801"><td class="memItemLeft" align="right" valign="top">typedef <a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84">hwloc_bitmap_t</a>&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00075.php#ga4bbf39b68b6f568fb92739e7c0ea7801">hwloc_cpuset_t</a></td></tr>
<tr class="separator:ga4bbf39b68b6f568fb92739e7c0ea7801"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:ga1f784433e9b606261f62d1134f6a3b25"><td class="memItemLeft" align="right" valign="top">typedef <a class="el" href="a00099.php#gae991a108af01d408be2776c5b2c467b2">hwloc_const_bitmap_t</a>&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00075.php#ga1f784433e9b606261f62d1134f6a3b25">hwloc_const_cpuset_t</a></td></tr>
<tr class="separator:ga1f784433e9b606261f62d1134f6a3b25"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:ga37e35730fa7e775b5bb0afe893d6d508"><td class="memItemLeft" align="right" valign="top">typedef <a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84">hwloc_bitmap_t</a>&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00075.php#ga37e35730fa7e775b5bb0afe893d6d508">hwloc_nodeset_t</a></td></tr>
<tr class="separator:ga37e35730fa7e775b5bb0afe893d6d508"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:ga2f5276235841ad66a79bedad16a5a10c"><td class="memItemLeft" align="right" valign="top">typedef <a class="el" href="a00099.php#gae991a108af01d408be2776c5b2c467b2">hwloc_const_bitmap_t</a>&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00075.php#ga2f5276235841ad66a79bedad16a5a10c">hwloc_const_nodeset_t</a></td></tr>
<tr class="separator:ga2f5276235841ad66a79bedad16a5a10c"><td class="memSeparator" colspan="2">&#160;</td></tr>
</table>
<a name="details" id="details"></a><h2 class="groupheader">Detailed Description</h2>
<p>Hwloc uses bitmaps to represent two distinct kinds of object sets: CPU sets (<a class="el" href="a00075.php#ga4bbf39b68b6f568fb92739e7c0ea7801" title="A CPU set is a bitmap whose bits are set according to CPU physical OS indexes. ">hwloc_cpuset_t</a>) and NUMA node sets (<a class="el" href="a00075.php#ga37e35730fa7e775b5bb0afe893d6d508" title="A node set is a bitmap whose bits are set according to NUMA memory node physical OS indexes...">hwloc_nodeset_t</a>). These types are both typedefs to a common back end type (<a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84" title="Set of bits represented as an opaque pointer to an internal bitmap. ">hwloc_bitmap_t</a>), and therefore all the hwloc bitmap functions are applicable to both <a class="el" href="a00075.php#ga4bbf39b68b6f568fb92739e7c0ea7801" title="A CPU set is a bitmap whose bits are set according to CPU physical OS indexes. ">hwloc_cpuset_t</a> and <a class="el" href="a00075.php#ga37e35730fa7e775b5bb0afe893d6d508" title="A node set is a bitmap whose bits are set according to NUMA memory node physical OS indexes...">hwloc_nodeset_t</a> (see <a class="el" href="a00099.php">The bitmap API</a>).</p>
<p>The rationale for having two different types is that even though the actions one wants to perform on these types are the same (e.g., enable and disable individual items in the set/mask), they're used in very different contexts: one for specifying which processors to use and one for specifying which NUMA nodes to use. Hence, the name difference is really just to reflect the intent of where the type is used. </p>
<h2 class="groupheader">Typedef Documentation</h2>
<a class="anchor" id="ga1f784433e9b606261f62d1134f6a3b25"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">typedef <a class="el" href="a00099.php#gae991a108af01d408be2776c5b2c467b2">hwloc_const_bitmap_t</a> <a class="el" href="a00075.php#ga1f784433e9b606261f62d1134f6a3b25">hwloc_const_cpuset_t</a></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>A non-modifiable <a class="el" href="a00075.php#ga4bbf39b68b6f568fb92739e7c0ea7801" title="A CPU set is a bitmap whose bits are set according to CPU physical OS indexes. ">hwloc_cpuset_t</a>. </p>

</div>
</div>
<a class="anchor" id="ga2f5276235841ad66a79bedad16a5a10c"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">typedef <a class="el" href="a00099.php#gae991a108af01d408be2776c5b2c467b2">hwloc_const_bitmap_t</a> <a class="el" href="a00075.php#ga2f5276235841ad66a79bedad16a5a10c">hwloc_const_nodeset_t</a></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>A non-modifiable <a class="el" href="a00075.php#ga37e35730fa7e775b5bb0afe893d6d508" title="A node set is a bitmap whose bits are set according to NUMA memory node physical OS indexes...">hwloc_nodeset_t</a>. </p>

</div>
</div>
<a class="anchor" id="ga4bbf39b68b6f568fb92739e7c0ea7801"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">typedef <a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84">hwloc_bitmap_t</a> <a class="el" href="a00075.php#ga4bbf39b68b6f568fb92739e7c0ea7801">hwloc_cpuset_t</a></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>A CPU set is a bitmap whose bits are set according to CPU physical OS indexes. </p>
<p>It may be consulted and modified with the bitmap API as any <a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84" title="Set of bits represented as an opaque pointer to an internal bitmap. ">hwloc_bitmap_t</a> (see <a class="el" href="a00057_source.php" title="The bitmap API, for use in hwloc itself. ">hwloc/bitmap.h</a>).</p>
<p>Each bit may be converted into a PU object using <a class="el" href="a00093.php#ga751c238a4931db5cc0ca3181b7dd7479" title="Returns the object of type HWLOC_OBJ_PU with os_index. ">hwloc_get_pu_obj_by_os_index()</a>. </p>

</div>
</div>
<a class="anchor" id="ga37e35730fa7e775b5bb0afe893d6d508"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">typedef <a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84">hwloc_bitmap_t</a> <a class="el" href="a00075.php#ga37e35730fa7e775b5bb0afe893d6d508">hwloc_nodeset_t</a></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>A node set is a bitmap whose bits are set according to NUMA memory node physical OS indexes. </p>
<p>It may be consulted and modified with the bitmap API as any <a class="el" href="a00099.php#gaa3c2bf4c776d603dcebbb61b0c923d84" title="Set of bits represented as an opaque pointer to an internal bitmap. ">hwloc_bitmap_t</a> (see <a class="el" href="a00057_source.php" title="The bitmap API, for use in hwloc itself. ">hwloc/bitmap.h</a>). Each bit may be converted into a NUMA node object using <a class="el" href="a00093.php#gab89d9ed9edfaa3dd526fb6ee1a1618ea" title="Returns the object of type HWLOC_OBJ_NUMANODE with os_index. ">hwloc_get_numanode_obj_by_os_index()</a>.</p>
<p>When binding memory on a system without any NUMA node (when the whole memory is considered as a single memory bank), the nodeset may be either empty (no memory selected) or full (whole system memory selected).</p>
<p>See also <a class="el" href="a00096.php">Converting between CPU sets and node sets</a>. </p>

</div>
</div>
</div><!-- contents -->
<?php
include_once("$topdir/includes/footer.inc");
