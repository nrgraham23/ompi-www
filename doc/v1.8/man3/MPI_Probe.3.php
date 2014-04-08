<?php
$topdir = "../../..";
$title = "MPI_Probe(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_PROBE(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Probe</b> - Blocking test for a message.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Probe(int source, int tag, MPI_Comm comm, MPI_Status *status)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_PROBE(SOURCE, TAG, COMM, STATUS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SOURCE, TAG, COMM, STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Comm::Probe(int source, int tag, Status&amp; status) const
void Comm::Probe(int source, int tag) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>source </dt>
<dd>Source rank or MPI_ANY_SOURCE (integer). </dd>

<dt>tag </dt>
<dd>Tag
value or MPI_ANY_TAG (integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>status
</dt>
<dd>Status object (status). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The
MPI_Probe and <a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a> operations allow checking of incoming messages,
without actual receipt of them. The user can then decide how to receive
them, based on the information returned by the probe in the status variable.
For example, the user may allocate memory for the receive buffer, according
to the length of the probed message.  <p>
MPI_Probe behaves like <a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a>
except that it is a blocking call that returns only after a matching message
has been found. <p>
If your application does not need to examine the <i>status</i>
field, you can save resources by using the predefined constant MPI_STATUS_IGNORE
as a special value for the <i>status</i> argument.  <p>
The semantics of MPI_Probe
and <a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a> guarantee progress: If a call to MPI_Probe has been issued
by a process, and a send that matches the probe has been initiated by some
process, then the call to MPI_Probe will return, unless the message is
received by another concurrent receive operation (that is executed by another
thread at the probing process). Similarly, if a process busy waits with
<a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a> and a matching message has been issued, then the call to <a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a>
will eventually return flag = true unless the message is received by another
concurrent receive operation.  <p>
<b>Example 1:</b> Use blocking probe to wait for
an incoming message.  <p>
<br>
<pre>CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, rank, ierr)
       IF (rank.EQ.0) THEN
            CALL <a href="../man3/MPI_Send.3.php">MPI_SEND</a>(i, 1, MPI_INTEGER, 2, 0, comm, ierr)
       ELSE IF(rank.EQ.1) THEN
            CALL <a href="../man3/MPI_Send.3.php">MPI_SEND</a>(x, 1, MPI_REAL, 2, 0, comm, ierr)
       ELSE   ! rank.EQ.2
           DO i=1, 2
              CALL MPI_PROBE(MPI_ANY_SOURCE, 0,
                              comm, status, ierr)
              IF (status(MPI_SOURCE) = 0) THEN
100                CALL <a href="../man3/MPI_Recv.3.php">MPI_RECV</a>(i, 1, MPI_INTEGER, 0, 0, status, ierr)

              ELSE
200                CALL <a href="../man3/MPI_Recv.3.php">MPI_RECV</a>(x, 1, MPI_REAL, 1, 0, status, ierr)
              END IF
           END DO
       END IF
</pre><p>
Each message is received with the right type. <p>
<b>Example 2:</b> A program similar
to the previous example, but with a problem.  <p>
<br>
<pre>CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, rank, ierr)
       IF (rank.EQ.0) THEN
            CALL <a href="../man3/MPI_Send.3.php">MPI_SEND</a>(i, 1, MPI_INTEGER, 2, 0, comm, ierr)
       ELSE IF(rank.EQ.1) THEN
            CALL <a href="../man3/MPI_Send.3.php">MPI_SEND</a>(x, 1, MPI_REAL, 2, 0, comm, ierr)
       ELSE
           DO i=1, 2
              CALL MPI_PROBE(MPI_ANY_SOURCE, 0,
                              comm, status, ierr)
              IF (status(MPI_SOURCE) = 0) THEN
100                CALL <a href="../man3/MPI_Recv.3.php">MPI_RECV</a>(i, 1, MPI_INTEGER, MPI_ANY_SOURCE,
                                 0, status, ierr)
              ELSE
200                CALL <a href="../man3/MPI_Recv.3.php">MPI_RECV</a>(x, 1, MPI_REAL, MPI_ANY_SOURCE,
                                 0, status, ierr)
              END IF
           END DO
       END IF
</pre><p>
We slightly modified Example 2, using MPI_ANY_SOURCE as the source argument
in the two receive calls in statements labeled 100 and 200. The program
is now incorrect: The receive operation may receive a message that is distinct
from the message probed by the preceding call to MPI_Probe.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Iprobe.3.php">MPI_Iprobe</a> <br>

<p><a href="../man3/MPI_Cancel.3.php">MPI_Cancel</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
