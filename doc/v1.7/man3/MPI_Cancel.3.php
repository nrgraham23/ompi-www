<?php
$topdir = "../../..";
$title = "MPI_Cancel(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_CANCEL(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Cancel</b> - Cancels a communication request.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Cancel(MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_CANCEL(REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Request::Cancel() const
</pre>
<h2><a name='sect5' href='#toc5'>Java Syntax</a></h2>
<br>
<pre>import mpi.*;
void MPI.Request.Cancel()
</pre>
<h2><a name='sect6' href='#toc6'>Input Parameter</a></h2>

<dl>

<dt>request </dt>
<dd>Communication request (handle).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Output Parameter</a></h2>

<dl>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect8' href='#toc8'>Description</a></h2>
The MPI_Cancel operation
allows pending communications to be canceled. This is required for cleanup.
Posting a send or a receive ties up user resources (send or receive buffers),
and a cancel may be needed to free these resources gracefully.  <p>
A call to
MPI_Cancel marks for cancellation a pending, nonblocking communication
operation (send or receive). The cancel call is local. It returns immediately,
possibly before the communication is actually canceled. It is still necessary
to complete a communication that has been marked for cancellation, using
a call to <a href="../man3/MPI_Request_free.3.php">MPI_Request_free</a>, <a href="../man3/MPI_Wait.3.php">MPI_Wait</a>, or <a href="../man3/MPI_Test.3.php">MPI_Test</a> (or any of the derived
operations).   <p>
If a communication is marked for cancellation, then an <a href="../man3/MPI_Wait.3.php">MPI_Wait</a>
call for that communication is guaranteed to return, irrespective of the
activities of other processes (i.e., <a href="../man3/MPI_Wait.3.php">MPI_Wait</a> behaves as a local function);
similarly if <a href="../man3/MPI_Test.3.php">MPI_Test</a> is repeatedly called in a busy wait loop for a canceled
communication, then <a href="../man3/MPI_Test.3.php">MPI_Test</a> will eventually be successful. <p>
MPI_Cancel can
be used to cancel a communication that uses a persistent request (see Section
3.9 in the MPI-1 Standard, "Persistent Communication Requests") in the same
way it is used for nonpersistent requests. A successful cancellation cancels
the active communication, but not the request itself. After the call to
MPI_Cancel and the subsequent call to <a href="../man3/MPI_Wait.3.php">MPI_Wait</a> or <a href="../man3/MPI_Test.3.php">MPI_Test</a>, the request
becomes inactive and can be activated for a new communication.   <p>
The successful
cancellation of a buffered send frees the buffer space occupied by the
pending message.   <p>
Either the cancellation succeeds or the communication
succeeds, but not both. If a send is marked for cancellation, then it must
be the case that either the send completes normally, in which case the
message sent is received at the destination process, or that the send is
successfully canceled, in which case no part of the message is received
at the destination. Then, any matching receive has to be satisfied by another
send. If a receive is marked for cancellation, then it must be the case
that either the receive completes normally, or that the receive is successfully
canceled, in which case no part of the receive buffer is altered. Then,
any matching send has to be satisfied by another receive.  <p>
If the operation
has been canceled, then information to that effect will be returned in
the status argument of the operation that completes the communication.
<p>

<h2><a name='sect9' href='#toc9'>Notes</a></h2>
The primary expected use of MPI_Cancel is in multi-buffering schemes,
where speculative MPI_Irecvs are made.  When the computation completes,
some of these requests may remain; using MPI_Cancel allows the user to
cancel these unsatisfied requests.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<p>
<br>
<pre><a href="../man3/MPI_Probe.3.php">MPI_Probe</a>
<a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a>
<a href="../man3/MPI_Test_cancelled.3.php">MPI_Test_cancelled</a>
<a href="../man3/MPI_Cart_coords.3.php">MPI_Cart_coords</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
