<?php
$topdir = "../../..";
$title = "MPI_T_pvar_session_create(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_T_PVAR_SESSION_CREATE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_T_pvar_session_create</b>, <b><a href="../man3/MPI_T_pvar_session_free.3.php">MPI_T_pvar_session_free</a></b> - Create/free
performance variable session
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_T_pvar_session_create(MPI_T_pvar_session *session)
int <a href="../man3/MPI_T_pvar_session_free.3.php">MPI_T_pvar_session_free</a>(MPI_T_pvar_session *session)
DescriptionMPI_T_pvar_session_create creates a session for accessing performance
variables. The new session is returned in the session parameter.  <a href="../man3/MPI_T_pvar_session_free.3.php">MPI_T_pvar_session_free</a>
releases a session allocated by MPI_T_pvar_session_create and sets the
session parameter to MPI_T_PVAR_SESSION_NULL.  ErrorsMPI_T_pvar_session_create()
will fail if: [MPI_T_ERR_NOT_INITIALIZED] The MPI Tools interface not initialized
[MPI_T_ERR_MEMORY] Out of memory [MPI_T_ERR_OUT_OF_SESSIONS] No more sessions
available <a href="../man3/MPI_T_pvar_session_free.3.php">MPI_T_pvar_session_free</a>() will fail if: [MPI_T_ERR_NOT_INITIALIZED]
The MPI Tools interface not initialized [MPI_T_ERR_INVALID_SESSION] The
session parameter is not a valid session  
<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
