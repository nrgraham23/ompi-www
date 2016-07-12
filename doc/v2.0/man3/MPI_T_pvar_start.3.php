<?php
$topdir = "../../..";
$title = "MPI_T_pvar_start(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_T_PVAR_START(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_T_pvar_start</b>, <b><a href="../man3/MPI_T_pvar_stop.3.php">MPI_T_pvar_stop</a></b> - Start/stop a performance
variable
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_T_pvar_start(MPI_T_pvar_session session, MPI_T_pvar_handle handle)
int <a href="../man3/MPI_T_pvar_stop.3.php">MPI_T_pvar_stop</a>(MPI_T_pvar_session session, MPI_T_pvar_handle handle)
Input Parameterssession Performance experiment session. handle Performance
variable handle.  DescriptionMPI_T_pvar_start starts the performance variable
with the handle specified in handle. The special value MPI_T_PVAR_ALL_HANDLES
can be passed in handle to start all non-continuous handles in the session
specified in session.  <a href="../man3/MPI_T_pvar_stop.3.php">MPI_T_pvar_stop</a> stops the performance variable with
the handle specified in handle. The special value MPI_T_PVAR_ALL_HANDLES
can be passed in handle to stop all non-continuous handles in the session
specified in session.  Continuous performance variables can neither be started
nor stopped.  ErrorsMPI_T_pvar_start() and <a href="../man3/MPI_T_pvar_stop.3.php">MPI_T_pvar_stop</a>() will fail if:
[MPI_T_ERR_NOT_INITIALIZED] The MPI Tools interface not initialized [MPI_T_ERR_INVALID_SESSION]
Session parameter is not a valid session [MPI_T_ERR_INVALID_HANDLE] Invalid
handle or handle not associated with the session [MPI_T_ERR_PVAR_NO_STARTSTOP]
The variable cannot be started or stopped  See Also
<a href="../man3/MPI_T_pvar_get_info.3.php">MPI_T_pvar_get_info</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
