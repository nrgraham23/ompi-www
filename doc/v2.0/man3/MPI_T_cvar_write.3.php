<?php
$topdir = "../../..";
$title = "MPI_T_cvar_write(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_T_CVAR_WRITE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_T_cvar_write</b> - Write the value of a bound control variable

<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_T_cvar_write(MPI_T_cvar_handle handle, const void *buf)
</pre>
<h2><a name='sect3' href='#toc3'>Input Parameters</a></h2>

<dl>

<dt>handle </dt>
<dd>Handle of the control variable to be written. </dd>

<dt>buf
</dt>
<dd>Initial address of storage location for variable value.
<p> </dd>
</dl>

<h2><a name='sect4' href='#toc4'>Description</a></h2>
MPI_T_cvar_write
sets the value the control variable identified by the handle specified
in <i>handle</i> from the buffer provided in <i>buf</i>. The caller must ensure that the
buffer specified in <i>buf</i> is large enough to hold the entire value of the
control variable. If the variable has global scope, any write call must
be issued on all connected MPI processes. For more information see MPI-3
[char167] 14.3.6.
<p>
<h2><a name='sect5' href='#toc5'>Errors</a></h2>
MPI_T_cvar_write() will fail if:
<dl>

<dt>[MPI_T_ERR_NOT_INITIALIZED]
</dt>
<dd>The MPI Tools interface not initialized </dd>

<dt>[MPI_T_ERR_INVALID_HANDLE] </dt>
<dd>The
handle is invalid </dd>

<dt>[MPI_T_ERR_CVAR_SET_NOT_NOW] </dt>
<dd>Variable cannot be set at
this moment </dd>

<dt>[MPI_T_ERR_CVAR_SET_NEVER] </dt>
<dd>Variable cannot be set until end

<p>of execution
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>See Also</a></h2>
<br>
<pre><a href="../man3/MPI_T_cvar_handle_alloc.3.php">MPI_T_cvar_handle_alloc</a>
<a href="../man3/MPI_T_cvar_get_info.3.php">MPI_T_cvar_get_info</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
