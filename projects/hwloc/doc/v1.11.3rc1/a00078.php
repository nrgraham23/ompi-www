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
<a href="#typedef-members">Typedefs</a> &#124;
<a href="#func-members">Functions</a>  </div>
  <div class="headertitle">
<div class="title">Topology Creation and Destruction</div>  </div>
</div><!--header-->
<div class="contents">
<table class="memberdecls">
<tr class="heading"><td colspan="2"><h2 class="groupheader"><a name="typedef-members"></a>
Typedefs</h2></td></tr>
<tr class="memitem:ga9d1e76ee15a7dee158b786c30b6a6e38"><td class="memItemLeft" align="right" valign="top">typedef struct hwloc_topology *&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a></td></tr>
<tr class="separator:ga9d1e76ee15a7dee158b786c30b6a6e38"><td class="memSeparator" colspan="2">&#160;</td></tr>
</table><table class="memberdecls">
<tr class="heading"><td colspan="2"><h2 class="groupheader"><a name="func-members"></a>
Functions</h2></td></tr>
<tr class="memitem:ga03fd4a16d8b9ee1ffc32b25fd2f6bdfa"><td class="memItemLeft" align="right" valign="top">int&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00078.php#ga03fd4a16d8b9ee1ffc32b25fd2f6bdfa">hwloc_topology_init</a> (<a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> *topologyp)</td></tr>
<tr class="separator:ga03fd4a16d8b9ee1ffc32b25fd2f6bdfa"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:gabdf58d87ad77f6615fccdfe0535ff826"><td class="memItemLeft" align="right" valign="top">int&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00078.php#gabdf58d87ad77f6615fccdfe0535ff826">hwloc_topology_load</a> (<a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> topology)</td></tr>
<tr class="separator:gabdf58d87ad77f6615fccdfe0535ff826"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:ga9f34a640b6fd28d23699d4d084667b15"><td class="memItemLeft" align="right" valign="top">void&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00078.php#ga9f34a640b6fd28d23699d4d084667b15">hwloc_topology_destroy</a> (<a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> topology)</td></tr>
<tr class="separator:ga9f34a640b6fd28d23699d4d084667b15"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:ga62a161fc5e6f120344dc69a7bee4e587"><td class="memItemLeft" align="right" valign="top">int&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00078.php#ga62a161fc5e6f120344dc69a7bee4e587">hwloc_topology_dup</a> (<a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> *newtopology, <a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> oldtopology)</td></tr>
<tr class="separator:ga62a161fc5e6f120344dc69a7bee4e587"><td class="memSeparator" colspan="2">&#160;</td></tr>
<tr class="memitem:gaf6746bc3a558ef1ac8348b4491d091b5"><td class="memItemLeft" align="right" valign="top">void&#160;</td><td class="memItemRight" valign="bottom"><a class="el" href="a00078.php#gaf6746bc3a558ef1ac8348b4491d091b5">hwloc_topology_check</a> (<a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> topology)</td></tr>
<tr class="separator:gaf6746bc3a558ef1ac8348b4491d091b5"><td class="memSeparator" colspan="2">&#160;</td></tr>
</table>
<a name="details" id="details"></a><h2 class="groupheader">Detailed Description</h2>
<h2 class="groupheader">Typedef Documentation</h2>
<a class="anchor" id="ga9d1e76ee15a7dee158b786c30b6a6e38"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">typedef struct hwloc_topology* <a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>Topology context. </p>
<p>To be initialized with <a class="el" href="a00078.php#ga03fd4a16d8b9ee1ffc32b25fd2f6bdfa" title="Allocate a topology context. ">hwloc_topology_init()</a> and built with <a class="el" href="a00078.php#gabdf58d87ad77f6615fccdfe0535ff826" title="Build the actual topology. ">hwloc_topology_load()</a>. </p>

</div>
</div>
<h2 class="groupheader">Function Documentation</h2>
<a class="anchor" id="gaf6746bc3a558ef1ac8348b4491d091b5"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">void hwloc_topology_check </td>
          <td>(</td>
          <td class="paramtype"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a>&#160;</td>
          <td class="paramname"><em>topology</em></td><td>)</td>
          <td></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>Run internal checks on a topology structure. </p>
<p>The program aborts if an inconsistency is detected in the given topology.</p>
<dl class="params"><dt>Parameters</dt><dd>
  <table class="params">
    <tr><td class="paramname">topology</td><td>is the topology to be checked</td></tr>
  </table>
  </dd>
</dl>
<dl class="section note"><dt>Note</dt><dd>This routine is only useful to developers.</dd>
<dd>
The input topology should have been previously loaded with <a class="el" href="a00078.php#gabdf58d87ad77f6615fccdfe0535ff826" title="Build the actual topology. ">hwloc_topology_load()</a>. </dd></dl>

</div>
</div>
<a class="anchor" id="ga9f34a640b6fd28d23699d4d084667b15"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">void hwloc_topology_destroy </td>
          <td>(</td>
          <td class="paramtype"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a>&#160;</td>
          <td class="paramname"><em>topology</em></td><td>)</td>
          <td></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>Terminate and free a topology context. </p>
<dl class="params"><dt>Parameters</dt><dd>
  <table class="params">
    <tr><td class="paramname">topology</td><td>is the topology to be freed </td></tr>
  </table>
  </dd>
</dl>

</div>
</div>
<a class="anchor" id="ga62a161fc5e6f120344dc69a7bee4e587"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">int hwloc_topology_dup </td>
          <td>(</td>
          <td class="paramtype"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> *&#160;</td>
          <td class="paramname"><em>newtopology</em>, </td>
        </tr>
        <tr>
          <td class="paramkey"></td>
          <td></td>
          <td class="paramtype"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a>&#160;</td>
          <td class="paramname"><em>oldtopology</em>&#160;</td>
        </tr>
        <tr>
          <td></td>
          <td>)</td>
          <td></td><td></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>Duplicate a topology. </p>
<p>The entire topology structure as well as its objects are duplicated into a new one.</p>
<p>This is useful for keeping a backup while modifying a topology.</p>
<dl class="section note"><dt>Note</dt><dd>Object userdata is not duplicated since hwloc does not know what it point to. The objects of both old and new topologies will point to the same userdata. </dd></dl>

</div>
</div>
<a class="anchor" id="ga03fd4a16d8b9ee1ffc32b25fd2f6bdfa"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">int hwloc_topology_init </td>
          <td>(</td>
          <td class="paramtype"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a> *&#160;</td>
          <td class="paramname"><em>topologyp</em></td><td>)</td>
          <td></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>Allocate a topology context. </p>
<dl class="params"><dt>Parameters</dt><dd>
  <table class="params">
    <tr><td class="paramdir">[out]</td><td class="paramname">topologyp</td><td>is assigned a pointer to the new allocated context.</td></tr>
  </table>
  </dd>
</dl>
<dl class="section return"><dt>Returns</dt><dd>0 on success, -1 on error. </dd></dl>

</div>
</div>
<a class="anchor" id="gabdf58d87ad77f6615fccdfe0535ff826"></a>
<div class="memitem">
<div class="memproto">
      <table class="memname">
        <tr>
          <td class="memname">int hwloc_topology_load </td>
          <td>(</td>
          <td class="paramtype"><a class="el" href="a00078.php#ga9d1e76ee15a7dee158b786c30b6a6e38">hwloc_topology_t</a>&#160;</td>
          <td class="paramname"><em>topology</em></td><td>)</td>
          <td></td>
        </tr>
      </table>
</div><div class="memdoc">

<p>Build the actual topology. </p>
<p>Build the actual topology once initialized with <a class="el" href="a00078.php#ga03fd4a16d8b9ee1ffc32b25fd2f6bdfa" title="Allocate a topology context. ">hwloc_topology_init()</a> and tuned with <a class="el" href="a00079.php">Topology Detection Configuration and Query</a> routines. No other routine may be called earlier using this topology context.</p>
<dl class="params"><dt>Parameters</dt><dd>
  <table class="params">
    <tr><td class="paramname">topology</td><td>is the topology to be loaded with objects.</td></tr>
  </table>
  </dd>
</dl>
<dl class="section return"><dt>Returns</dt><dd>0 on success, -1 on error.</dd></dl>
<dl class="section note"><dt>Note</dt><dd>On failure, the topology is reinitialized. It should be either destroyed with <a class="el" href="a00078.php#ga9f34a640b6fd28d23699d4d084667b15" title="Terminate and free a topology context. ">hwloc_topology_destroy()</a> or configured and loaded again.</dd>
<dd>
This function may be called only once per topology.</dd></dl>
<dl class="section see"><dt>See also</dt><dd><a class="el" href="a00079.php">Topology Detection Configuration and Query</a> </dd></dl>

</div>
</div>
</div><!-- contents -->
<?php
include_once("$topdir/includes/footer.inc");
