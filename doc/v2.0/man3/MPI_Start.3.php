<?php
$topdir = "../../..";
$title = "MPI_Start(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_START(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Start</b> - Initiates a communication using a persistent request
handle.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Start(MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_START(REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Prequest::Start()
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>request </dt>
<dd>Communication request (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameter</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
A communication (send
or receive) that uses a persistent request is initiated by the function
MPI_Start. <p>
The argument, request, is a handle returned by one of the persistent
communication-request initialization functions (<a href="../man3/MPI_Send_init.3.php">MPI_Send_init</a>, <a href="../man3/MPI_Bsend_init.3.php">MPI_Bsend_init</a>,
 <a href="../man3/MPI_Ssend_init.3.php">MPI_Ssend_init</a>, <a href="../man3/MPI_Rsend_init.3.php">MPI_Rsend_init</a>, <a href="../man3/MPI_Recv_init.3.php">MPI_Recv_init</a>). The associated request
should be inactive and becomes active once the call is made. <p>
If the request
is for a send with ready mode, then a matching receive should be posted
before the call is made. From the time the call is made until after the
operation completes, the communication buffer should not be accessed. <p>
The
call is local, with semantics similar to the nonblocking communication
operations (see Section 3.7 in the MPI-1 Standard, "Nonblocking Communication.")
That is, a call to MPI_Start with a request created by <a href="../man3/MPI_Send_init.3.php">MPI_Send_init</a> starts
a communication in the same manner as a call to <a href="../man3/MPI_Isend.3.php">MPI_Isend</a>; a call to MPI_Start
with a request created by <a href="../man3/MPI_Bsend_init.3.php">MPI_Bsend_init</a> starts a communication in the
same manner as a call to <a href="../man3/MPI_Ibsend.3.php">MPI_Ibsend</a>; and so on.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines
return an error value; C routines as the value of the function and Fortran
routines in the last argument. C++ functions do not return errors. If the
default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error
the C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Bsend_init.3.php">MPI_Bsend_init</a> <br>
<a href="../man3/MPI_Rsend_init.3.php">MPI_Rsend_init</a> <br>
<a href="../man3/MPI_Send_init.3.php">MPI_Send_init</a> <br>
MPI_Sssend_init <br>
<a href="../man3/MPI_Recv_init.3.php">MPI_Recv_init</a> <br>

<p><a href="../man3/MPI_Startall.3.php">MPI_Startall</a>
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
