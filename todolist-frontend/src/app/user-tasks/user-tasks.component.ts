import { DbHelperService } from './../service/db-helper.service';
import {
  Component,
  Input,
  OnInit,
  AfterViewInit,
  OnChanges,
  SimpleChanges,
} from '@angular/core';

@Component({
  selector: 'app-user-tasks',
  templateUrl: './user-tasks.component.html',
  styleUrls: ['./user-tasks.component.scss'],
})
export class UserTasksComponent implements OnInit, AfterViewInit, OnChanges {
  @Input() user: string = '';
  @Input() close!: void;
  userProjects: any[] = [];
  constructor(private db: DbHelperService) {}

  ngOnInit(): void {}

  ngAfterViewInit(): void {
    this.getUserTask(this.user);
  }

  ngOnChanges(changes: SimpleChanges | any): void {
    if (changes.user.currentValue !== changes.user.previousValue) {
      this.getUserTask(changes.user.currentValue);
    }
  }

  getUserTask = (user: string) => {
    if (!user) return;
    this.userProjects = [];
    this.db.get(`/api/getUserTask/?user=${user}`).subscribe(({ data = [] }) => {
      this.userProjects = data;
      console.log(data);
    });
  };

  getTotal = (adata: any[]) => {
    return adata.reduce((total, o) => total + Number(o.hours), 0);
  };

  handleClose = () => {
    close();
  };
}
