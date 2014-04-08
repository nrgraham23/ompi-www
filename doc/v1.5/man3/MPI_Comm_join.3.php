<?php
$topdir = "../../..";
$title = "MPI_Comm_join(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_COMM_JOIN(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<p>
<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_join</b> - Establishes communication between MPI jobs
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<p>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_join(int fd, MPI_Comm *intercomm)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_JOIN(FD, INTERCOMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;FD, INTERCOMM, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI::Intercomm MPI::Comm::Join(const int fd)
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>fd </dt>
<dd>socket file descriptor (socket).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>intercomm
</dt>
<dd>Intercommunicator between processes (handle). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_join creates an intercommunicator
from the union of two MPI processes that are connected by a socket. <i>fd</i> is
a file descriptor representing a socket of type SOCK_STREAM (a two-way reliable
byte-stream connection). Nonblocking I/O and asynchronous notification via
SIGIO must not be enabled for the socket. The socket must be in a connected
state, and must be quiescent when MPI_Comm_join is called. <p>
MPI_Comm_join
must be called by the process at each end of the socket. It does not return
until both processes have called MPI_Comm_join.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
There are no MPI library
calls for opening and manipulating a socket. The socket <i>fd</i> can be opened
using standard socket API calls. MPI uses the socket to bootstrap creation
of the intercommunicator, and for nothing else. Upon return, the file descriptor
will be open and quiescent. <p>
In a multithreaded process, the application
must ensure that other threads do not access the socket while one is in
the midst of calling MPI_Comm_join. <p>
The returned communicator will contain
the two processes connected by the socket, and may be used to establish
MPI communication with additional processes, through the usual MPI communicator-creation
mechanisms.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI:Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.
 <p>
See the MPI man page for a full list of MPI error codes.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<br>
<pre>socket(3SOCKET)
<a href="../man3/MPI_Comm_create.3.php">MPI_Comm_create</a>
<a href="../man3/MPI_Comm_group.3.php">MPI_Comm_group</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
