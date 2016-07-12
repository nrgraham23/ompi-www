<?php
$topdir = "../../..";
$title = "MPI_Gatherv(3) man page (version 2.0.0)";
$meta_desc = "Open MPI v2.0.0 man page: MPI_GATHERV(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Gatherv, <a href="../man3/MPI_Igatherv.3.php">MPI_Igatherv</a></b> - Gathers varying amounts of data from

<p>all processes to the root process
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Gatherv(const void *sendbuf, int sendcount, MPI_Datatype sendtype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *recvbuf, const int recvcounts[], const int displs[], MPI_Datatype
recvtype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int root, MPI_Comm comm)
int <a href="../man3/MPI_Igatherv.3.php">MPI_Igatherv</a>(const void *sendbuf, int sendcount, MPI_Datatype sendtype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;void *recvbuf, const int recvcounts[], const int displs[], MPI_Datatype
recvtype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int root, MPI_Comm comm, MPI_Request *request)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GATHERV(SENDBUF, SENDCOUNT, SENDTYPE, RECVBUF, RECVCOUNTS,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;DISPLS, RECVTYPE, ROOT, COMM, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNT, SENDTYPE, RECVCOUNTS(*), DISPLS(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVTYPE, ROOT, COMM, IERROR
<a href="../man3/MPI_Igatherv.3.php">MPI_IGATHERV</a>(SENDBUF, SENDCOUNT, SENDTYPE, RECVBUF, RECVCOUNTS,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;DISPLS, RECVTYPE, ROOT, COMM, REQUEST, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;&lt;type&gt;<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDBUF(*), RECVBUF(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;SENDCOUNT, SENDTYPE, RECVCOUNTS(*), DISPLS(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;RECVTYPE, ROOT, COMM, REQUEST, IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Gatherv(const void* sendbuf, int sendcount,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; sendtype, void* recvbuf,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const int recvcounts[], const int displs[],
<tt> </tt>&nbsp;<tt> </tt>&nbsp;const MPI::Datatype&amp; recvtype, int root) const = 0
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>sendbuf </dt>
<dd>Starting address of send buffer (choice). </dd>

<dt>sendcount
</dt>
<dd>Number of elements in send buffer (integer). </dd>

<dt>sendtype </dt>
<dd>Datatype of send buffer
elements (handle). </dd>

<dt>recvcounts </dt>
<dd>Integer array (of length group size) containing
the number of elements that are received from each process (significant
only at root). </dd>

<dt>displs </dt>
<dd>Integer array (of length group size). Entry i specifies
the displacement relative to recvbuf at which to place the incoming data
from process i (significant only at root). </dd>

<dt>recvtype </dt>
<dd>Datatype of recv buffer
elements (significant only at root) (handle). </dd>

<dt>root </dt>
<dd>Rank of receiving process
(integer). </dd>

<dt>comm </dt>
<dd>Communicator (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>recvbuf </dt>
<dd>Address
of receive buffer (choice, significant only at root). </dd>

<dt>request </dt>
<dd>Request (handle,
non-blocking only). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Gatherv
extends the functionality of <a href="../man3/MPI_Gather.3.php">MPI_Gather</a> by allowing a varying count of
data from each process, since recvcounts is now an array. It also allows
more flexibility as to where the data is placed on the root, by providing
the new argument, displs. <p>
The outcome is as if each process, including the
root process, sends a message to the root, <p>
<br>
<pre>    <a href="../man3/MPI_Send.3.php">MPI_Send</a>(sendbuf, sendcount, sendtype, root, ...)
</pre><p>
and the root executes n receives, <p>
<br>
<pre>    <a href="../man3/MPI_Recv.3.php">MPI_Recv</a>(recvbuf + disp[i] * extent(recvtype), \
             recvcounts[i], recvtype, i, ...)
</pre><p>
Messages are placed in the receive buffer of the root process in rank order,
that is, the data sent from process j is placed in the jth portion of the
receive buffer recvbuf on process root. The jth portion of recvbuf begins
at offset displs[j] elements (in terms of recvtype) into recvbuf. <p>
The receive
buffer is ignored for all nonroot processes. <p>
The type signature implied
by sendcount, sendtype on process i must be equal to the type signature
implied by recvcounts[i], recvtype at the root. This implies that the amount
of data sent must be equal to the amount of data received, pairwise between
each process and the root. Distinct type maps between sender and receiver
are still allowed, as illustrated in Example 2, below. <p>
All arguments to
the function are significant on process root, while on other processes,
only arguments sendbuf, sendcount, sendtype, root, comm are significant.
The arguments root and comm must have identical values on all processes.
<p>
The specification of counts, types, and displacements should not cause
any location on the root to be written more than once. Such a call is erroneous.
<p>
<b>Example 1:</b>  Now have each process send 100 ints to root, but place each
set (of 100) stride ints apart at receiving end. Use MPI_Gatherv and the
displs argument to achieve this effect. Assume stride &gt;= 100. <p>
<br>
<pre>      MPI_Comm comm;
      int gsize,sendarray[100];
      int root, *rbuf, stride;
      int *displs,i,*rcounts;
  ...
      <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
      rbuf = (int *)malloc(gsize*stride*sizeof(int));
      displs = (int *)malloc(gsize*sizeof(int));
      rcounts = (int *)malloc(gsize*sizeof(int));
      for (i=0; i&lt;gsize; ++i) {
          displs[i] = i*stride;
          rcounts[i] = 100;
      }
      MPI_Gatherv(sendarray, 100, MPI_INT, rbuf, rcounts,
                  displs, MPI_INT, root, comm);
</pre><p>
Note that the program is erroneous if stride &lt; 100. <p>
<b>Example 2:</b> Same as Example
1 on the receiving side, but send the 100 ints from the 0th column of a
100 * 150 int array, in C. <p>
<br>
<pre>      MPI_Comm comm;
      int gsize,sendarray[100][150];
      int root, *rbuf, stride;
      MPI_Datatype stype;
      int *displs,i,*rcounts;
  ...
      <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
      rbuf = (int *)malloc(gsize*stride*sizeof(int));
      displs = (int *)malloc(gsize*sizeof(int));
      rcounts = (int *)malloc(gsize*sizeof(int));
      for (i=0; i&lt;gsize; ++i) {
          displs[i] = i*stride;
          rcounts[i] = 100;
      }
      /* Create datatype for 1 column of array
       */
      <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>(100, 1, 150, MPI_INT, &amp;stype);
      <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
      MPI_Gatherv(sendarray, 1, stype, rbuf, rcounts,
                  displs, MPI_INT, root, comm);
</pre><p>
<b>Example 3:</b> Process i sends (100-i) ints from the ith column of a 100 x 150
int array, in C. It is received into a buffer with stride, as in the previous
two examples. <p>
<br>
<pre>      MPI_Comm comm;
      int gsize,sendarray[100][150],*sptr;
      int root, *rbuf, stride, myrank;
      MPI_Datatype stype;
      int *displs,i,*rcounts;
  ...
      <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
      <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );
      rbuf = (int *)malloc(gsize*stride*sizeof(int));
      displs = (int *)malloc(gsize*sizeof(int));
      rcounts = (int *)malloc(gsize*sizeof(int));
      for (i=0; i&lt;gsize; ++i) {
          displs[i] = i*stride;
          rcounts[i] = 100-i;  /* note change from previous example */
      }
      /* Create datatype for the column we are sending
       */
      <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>(100-myrank, 1, 150, MPI_INT, &amp;stype);
      <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
      /* sptr is the address of start of "myrank" column
       */
      sptr = &amp;sendarray[0][myrank];
      MPI_Gatherv(sptr, 1, stype, rbuf, rcounts, displs, MPI_INT,
         root, comm);
</pre><p>
Note that a different amount of data is received from each process. <p>
<b>Example
4:</b> Same as Example 3, but done in a different way at the sending end. We
create a datatype that causes the correct striding at the sending end so
that we read a column of a C array. <p>
<br>
<pre>      MPI_Comm comm;
      int gsize,sendarray[100][150],*sptr;
      int root, *rbuf, stride, myrank, disp[2], blocklen[2];
      MPI_Datatype stype,type[2];
      int *displs,i,*rcounts;
  ...
      <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>(comm, &amp;gsize);
      <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );
      rbuf = (int *)alloc(gsize*stride*sizeof(int));
      displs = (int *)malloc(gsize*sizeof(int));
      rcounts = (int *)malloc(gsize*sizeof(int));
      for (i=0; i&lt;gsize; ++i) {
          displs[i] = i*stride;
          rcounts[i] = 100-i;
      }
      /* Create datatype for one int, with extent of entire row
       */
      disp[0] = 0;       disp[1] = 150*sizeof(int);
      type[0] = MPI_INT; type[1] = MPI_UB;
      blocklen[0] = 1;   blocklen[1] = 1;
      <a href="../man3/MPI_Type_struct.3.php">MPI_Type_struct</a>( 2, blocklen, disp, type, &amp;stype );
      <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
      sptr = &amp;sendarray[0][myrank];
      MPI_Gatherv(sptr, 100-myrank, stype, rbuf, rcounts,
                  displs, MPI_INT, root, comm);
</pre><p>
<b>Example 5:</b> Same as Example 3 at sending side, but at receiving side we
make the  stride between received blocks vary from block to block. <p>
<br>
<pre>      MPI_Comm comm;
      int gsize,sendarray[100][150],*sptr;
      int root, *rbuf, *stride, myrank, bufsize;
      MPI_Datatype stype;
      int *displs,i,*rcounts,offset;
  ...
      <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>( comm, &amp;gsize);
      <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );
  stride = (int *)malloc(gsize*sizeof(int));
     ...
      /* stride[i] for i = 0 to gsize-1 is set somehow
       */
  /* set up displs and rcounts vectors first
       */
      displs = (int *)malloc(gsize*sizeof(int));
      rcounts = (int *)malloc(gsize*sizeof(int));
      offset = 0;
      for (i=0; i&lt;gsize; ++i) {
          displs[i] = offset;
          offset += stride[i];
          rcounts[i] = 100-i;
      }
      /* the required buffer size for rbuf is now easily obtained
       */
      bufsize = displs[gsize-1]+rcounts[gsize-1];
      rbuf = (int *)malloc(bufsize*sizeof(int));
      /* Create datatype for the column we are sending
       */
      <a href="../man3/MPI_Type_vector.3.php">MPI_Type_vector</a>(100-myrank, 1, 150, MPI_INT, &amp;stype);
      <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
      sptr = &amp;sendarray[0][myrank];
      MPI_Gatherv(sptr, 1, stype, rbuf, rcounts,
                  displs, MPI_INT, root, comm);
</pre><p>
<b>Example 6:</b> Process i sends num ints from the ith column of a 100 x 150
int array, in C.  The complicating factor is that the various values of
num are not known to root, so a separate gather must first be run to find
these out. The data is placed contiguously at the receiving end. <p>
<br>
<pre>      MPI_Comm comm;
      int gsize,sendarray[100][150],*sptr;
      int root, *rbuf, stride, myrank, disp[2], blocklen[2];
      MPI_Datatype stype,types[2];
      int *displs,i,*rcounts,num;
  ...
      <a href="../man3/MPI_Comm_size.3.php">MPI_Comm_size</a>( comm, &amp;gsize);
      <a href="../man3/MPI_Comm_rank.3.php">MPI_Comm_rank</a>( comm, &amp;myrank );
  /* First, gather nums to root
       */
      rcounts = (int *)malloc(gsize*sizeof(int));
      <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>( &amp;num, 1, MPI_INT, rcounts, 1, MPI_INT, root, comm);
      /* root now has correct rcounts, using these we set
       * displs[] so that data is placed contiguously (or
       * concatenated) at receive end
       */
      displs = (int *)malloc(gsize*sizeof(int));
      displs[0] = 0;
      for (i=1; i&lt;gsize; ++i) {
          displs[i] = displs[i-1]+rcounts[i-1];
      }
      /* And, create receive buffer
       */
      rbuf = (int *)malloc(gsize*(displs[gsize-1]+rcounts[gsize-1])
              *sizeof(int));
      /* Create datatype for one int, with extent of entire row
       */
      disp[0] = 0;       disp[1] = 150*sizeof(int);
      type[0] = MPI_INT; type[1] = MPI_UB;
      blocklen[0] = 1;   blocklen[1] = 1;
      <a href="../man3/MPI_Type_struct.3.php">MPI_Type_struct</a>( 2, blocklen, disp, type, &amp;stype );
      <a href="../man3/MPI_Type_commit.3.php">MPI_Type_commit</a>( &amp;stype );
      sptr = &amp;sendarray[0][myrank];
      MPI_Gatherv(sptr, num, stype, rbuf, rcounts,
                  displs, MPI_INT, root, comm);
</pre>
<h2><a name='sect8' href='#toc8'>Use of In-place Option</a></h2>
The in-place option operates in the same way as it
does for <a href="../man3/MPI_Gather.3.php">MPI_Gather</a>.  When the communicator is an intracommunicator, you
can perform a gather operation in-place (the output buffer is used as the
input buffer).  Use the variable MPI_IN_PLACE as the value of the root process
<i>sendbuf</i>.  In this case, <i>sendcount</i> and <i>sendtype</i> are ignored, and the contribution
of the root process to the gathered vector is assumed to already be in
the correct place in the receive buffer. <p>
Note that MPI_IN_PLACE is a special
kind of value; it has the same restrictions on its use as MPI_BOTTOM. <p>
Because
the in-place option converts the receive buffer into a send-and-receive buffer,
a Fortran binding that includes INTENT must mark these as INOUT, not OUT.
<p>

<h2><a name='sect9' href='#toc9'>When Communicator is an Inter-communicator</a></h2>
<p>
When the communicator is an inter-communicator,
the root process in the first group gathers data from all the processes
in the second group.  The first group defines the root process.  That process
uses MPI_ROOT as the value of its <i>root</i> argument.  The remaining processes
use MPI_PROC_NULL as the value of their <i>root</i> argument.  All processes in
the second group use the rank of that root process in the first group as
the value of their <i>root</i> argument.   The send buffer argument of the processes
in the first group must be consistent with the receive buffer argument
of the root process in the second group. <p>

<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
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
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<p>
<br>
<pre><a href="../man3/MPI_Gather.3.php">MPI_Gather</a>
<a href="../man3/MPI_Scatter.3.php">MPI_Scatter</a>
<a href="../man3/MPI_Scatterv.3.php">MPI_Scatterv</a>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
