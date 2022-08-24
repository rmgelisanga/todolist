import {
  AfterViewInit,
  ChangeDetectorRef,
  Component,
  OnInit,
} from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Observable, of, finalize, debounceTime, switchMap } from 'rxjs';
import { DbHelperService } from '../service/db-helper.service';

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss'],
})
export class ProjectsComponent implements OnInit, AfterViewInit {
  projects: any[] = [];
  selectedProject: any = null;
  selectedUser: string | null = null;

  constructor(
    private db: DbHelperService,
    private cdRef: ChangeDetectorRef,
    private route: ActivatedRoute
  ) {
    this.route.queryParams.subscribe((params: any) => {
      this.selectedUser = params?.user ?? null;
    });
  }

  ngOnInit(): void {}

  ngAfterViewInit(): void {
    this.cdRef.detectChanges();
    this.getProjects();
  }

  // fetch the project
  getProjects = () => {
    this.db.get('/api/projects').subscribe(({ data = [] }) => {
      this.projects = data;
    });
  };

  // set selected project
  setProject(project: any) {
    this.selectedProject = project;
  }

  closeDetail = () => {
    this.setProject(null);
  };

  closeUser = () => {
    this.selectedUser = null;
  };
}
